<?php

namespace App\Http\Controllers\Mobile;

use App\Award;
use App\Box;
use App\Http\Requests\Mobile\Box\BoxCreateRequest;
use App\Http\Requests\Mobile\Box\BoxInstalmentRequest;
use App\Http\Requests\Mobile\Box\BoxUpdateRequest;
use App\Instalment;
use App\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function allInstalmentsMonth(Request $request, $id) {
        $instalments = Instalment::where('box_id', '=', $id)
            ->whereMonth('date', '=', date('m'))
            ->get();
        $box = Box::findOrFail($id);
        return view('mobile.boxes.all_instalments_month', compact('instalments', 'box'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::where('user_id', '=', auth()->user()->id)
            ->paginate();
        return view('mobile.boxes.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participants = Participant::where('user_id', '=', auth()->user()->id)
            ->orderBy('name', 'asc')
            ->get();
        return view('mobile.boxes.create', compact('participants'));
    }

    public function winnerOfMonth(Request $request, $id)
    {
        $box = Box::findOrFail($id);

        $last_award = Award::where('box_id', '=', $box->id)
            ->orderBy('id', 'desc')
            ->get()
            ->first();

        return view('mobile.boxes.winner_of_month', compact('last_award'));
    }

    public function awards(Request $request, $id)
    {
        $box = Box::findOrFail($id);

        //Premiação por sorteio
        if($box->method_payment == 0) {
            $instalment = Instalment::where('box_id', '=', $box->id)
                ->whereMonth('date', '=', date('m'))
                ->inRandomOrder()
                ->get()
                ->first();
            $award = new Award;
            $award->participant_id = $instalment->participant_id;
            $award->instalment_id = $instalment->id;
            $award->box_id = $box->id;
            $award->value = $instalment->value;

            if($award->save()) {
                $box->last_award = date('Y-m-d');
                $box->save();
                return redirect()->route('mobile.boxes.winner_of_month', $box->id);
            }
        } else {
            //Premiação por ordem
            $instalment = Instalment::where('box_id', '=', $box->id)
                ->whereMonth('date', '=', date('m'))
                ->orderBy('id')
                ->get()
                ->first();
            $award = new Award;
            $award->participant_id = $instalment->participant_id;
            $award->instalment_id = $instalment->id;
            $award->box_id = $box->id;
            $award->value = $instalment->value;

            if($award->save()) {
                $box->last_award = date('Y-m-d');
                $box->save();
                return redirect()->route('mobile.boxes.winner_of_month', $box->id);
            }
        }

        //return view('mobile.boxes.participants', compact('box', 'participants'));
    }

    public function participants(BoxInstalmentRequest $request, $id)
    {
        $box = Box::findOrFail($id);

        if ($request->isMethod('post')) {
            $request->value_total = format_money($request->value_total);

            $month_end = format_without_mask($request->date_end, '/');
            $month_end = Carbon\Carbon::parse($month_end);

            $month_begin = format_without_mask($request->date_begin, '/');
            $month_begin = Carbon\Carbon::parse($month_begin);



            $begin = format_without_mask($request->date_begin, '/');
            $begin = Carbon\Carbon::parse($begin);
            $begin = $begin->addMonths(1);
            $difference = $month_end->diffInMonths($month_begin);

            //$month_begin->addMonths(1);
            foreach ($request->participant_id as $participant) {
                $month_begin = format_without_mask($request->date_begin, '/');
                $month_begin = Carbon\Carbon::parse($month_begin);

                for($i = 0; $i < $difference; $i++) {
                    $instalment = new Instalment;
                    $instalment->participant_id = $participant;
                    $instalment->box_id = $box->id;
                    $instalment->is_paid = 0;
                    $instalment->value = $request->value_total / $difference;
                    $instalment->date = $month_begin;
                    $instalment->save();
                    $month_begin->addMonths(1);
                }
            }

            $box->has_instalment = 1;
            $box->save();
            return redirect()->route('mobile.boxes.participants', $box->id)
                ->withInput()
                ->withFlashSuccess('Parcelas geradas com sucesso');
        }


        $box->value_total = number_format($box->value_total, 2, ',', '.');

        $participants = Participant::where('user_id', '=', auth()->user()->id);

        if($box->method_payment == 0) {
            $participants->orderBy('name', 'asc');
        } else {
            $participants->orderBy('id', 'asc');
        }

        $participants = $participants->get();

        return view('mobile.boxes.participants', compact('box', 'participants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxCreateRequest $request)
    {
        $box = new Box;
        $box->name = $request->name;
        $box->value_total = str_replace([
            'R$',
            ' '
        ], '', $request->value_total);
        $box->value_total = str_replace('.', '', $box->value_total);
        $box->value_total = str_replace(',', '.', $box->value_total);

        $box->date_begin = format_with_mask($request->date_begin);
        $box->date_end = format_with_mask($request->date_end);

        $month_end = Carbon\Carbon::parse($box->date_end);
        $month_begin = Carbon\Carbon::parse($box->date_begin);

        $box->months = $month_end->diffInMonths($month_begin);

        if($box->months < 2) {
            return redirect()->route('mobile.boxes.create')
                ->withInput()
                ->withErrors([
                    'date_begin' => [
                        'Informe datas que tenha pelo menos 2 meses de diferença'
                    ]
                ]);
        }

        $box->user_id = Auth::user()->id;

        if($box->save()) {
            if(count($request->participant_id) > 0) {
                $box->participants()->attach($request->participant_id);
            }
            return redirect()->route('mobile.boxes.index')
                ->withFlashSuccess('Caixa criado com sucesso');
        }
        return redirect()->route('mobile.boxes.index')
            ->withFlashDanger('Erro ao criar o Caixa, tente novamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $box = Box::findOrFail($id);
        $participants = Participant::where('user_id', '=', auth()->user()->id)
            ->orderBy('name', 'asc')
            ->get();
        return view('mobile.boxes.edit', compact('box', 'participants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxUpdateRequest $request, $id)
    {
        $box = Box::findOrFail($id);
        $box->name = $request->name;

        $box->value_total = str_replace([
            'R$',
            ' '
        ], '', $request->value_total);
        $box->value_total = str_replace('.', '', $box->value_total);
        $box->value_total = str_replace(',', '.', $box->value_total);

        $box->date_begin = format_with_mask($request->date_begin);
        $box->date_end = format_with_mask($request->date_end);

        $month_end = Carbon\Carbon::parse($box->date_end);
        $month_begin = Carbon\Carbon::parse($box->date_begin);

        $box->months = $month_end->diffInMonths($month_begin);
        if($box->months < 2) {
            return redirect()->route('mobile.boxes.edit', $id)
                ->withInput()
                ->withErrors([
                    'date_begin' => [
                        'Informe datas que tenha pelo menos 2 meses de diferença'
                    ]
                ]);
        }

        if($box->save()) {
            if(count($request->participant_id) > 0) {
                $box->participants()->sync($request->participant_id);
            }
            return redirect()->route('mobile.boxes.index')
                ->withFlashSuccess('Caixa atualizado com sucesso');
        }
        return redirect()->route('mobile.boxes.index')
            ->withFlashDanger('Erro ao atualizar o Caixa, tente novamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $box = Box::findOrFail($id);
        if($box->delete()) {
            return redirect()->route('mobile.boxes.index')
                ->withFlashSuccess('Caixa excluído com sucesso');
        }
        return redirect()->route('mobile.boxes.index')
            ->withFlashDanger('Erro ao deletar o Caixa, tente novamente');
    }
}
