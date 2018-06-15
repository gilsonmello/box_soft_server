<?php

namespace App\Http\Controllers\Mobile;

use App\Box;
use App\Http\Requests\Mobile\Participant\ParticipantInstalmentRequest;
use App\Http\Requests\Mobile\Participant\PaticipantCreateRequest;
use App\Http\Requests\Mobile\Participant\PaticipantUpdateRequest;
use App\Instalment;
use App\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function instalments(ParticipantInstalmentRequest $request, $box_id, $participant_id)
    {
        if($request->is('post')) {

        }
        $instalments = Instalment::where('box_id', '=', $box_id)
            ->where('participant_id', '=', $participant_id)
            ->get();
        $participant = Participant::find($participant_id);
        return view('mobile.participants.instalments', compact('instalments', 'box_id', 'participant_id', 'participant'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $participants = Participant::where('user_id', '=', auth()->user()->id)
            ->paginate();
        return view('mobile.participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobile.participants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaticipantCreateRequest $request)
    {
        $participant = Participant::where('user_id', '=', Auth::user()->id)
            ->where('email', '=', $request->email)
            ->get();

        if(!$participant->isEmpty()) {
            return redirect()
                ->route('mobile.participants.create')
                ->withInput()
                ->withFlashDanger('E-mail encontra-se em uso, tente outro.');
        }

        $participant = new Participant;
        $participant->name = $request->name;
        $participant->email = $request->email;
        $participant->user_id = Auth::user()->id;
        $participant->cpf = $request->cpf;
        $participant->rg = $request->rg;
        $participant->birth_date = format_without_mask($request->birth_date, '/');
        $participant->phone = $request->phone;
        $participant->cell_phone = $request->cell_phone;
        $participant->zip = $request->zip;
        $participant->number = $request->number;
        $participant->city = $request->city;
        $participant->district = $request->district;
        $participant->street = $request->street;
        $participant->state = $request->state;

        if($participant->save()) {
            return redirect()
                ->route('mobile.participants.index')
                ->withFlashSuccess('Participante criado com sucesso');
        }
        return redirect()
            ->route('mobile.participants.index')
            ->withFlashDanger('Erro ao criar o Participante, tente novamente');
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
        $participant = Participant::findOrFail($id);
        return view('mobile.participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaticipantUpdateRequest $request, $id)
    {
        $participant = Participant::where('user_id', '=', Auth::user()->id)
            ->where('email', '=', $request->email)
            ->get()
            ->first();

        $participant_exist = Participant::find($id);

        //Se o usuário logado já possui participante cadastrado com o e-mail informado
        if($participant != null) {
            //Se forem diferentes, é porque o usuário logado já possui aquele e-mail cadastrado
            if($participant_exist->email != $participant->email) {
                return redirect()->route('mobile.participants.create')
                    ->withInput()
                    ->withFlashDanger('E-mail encontra-se em uso, tente outro.');
            }
        }

        $participant = Participant::findOrFail($id);
        $participant->name = $request->name;
        $participant->email = $request->email;
        $participant->cpf = $request->cpf;
        $participant->rg = $request->rg;
        $participant->birth_date = format_without_mask($request->birth_date, '/');
        $participant->phone = $request->phone;
        $participant->cell_phone = $request->cell_phone;
        $participant->zip = $request->zip;
        $participant->number = $request->number;
        $participant->city = $request->city;
        $participant->district = $request->district;
        $participant->street = $request->street;
        $participant->state = $request->state;

        if($participant->save()) {
            return redirect()
                ->route('mobile.participants.index')
                ->withFlashSuccess('Participante criado com sucesso');
        }
        return redirect()
            ->route('mobile.participants.index')
            ->withFlashDanger('Erro ao criar o Participante, tente novamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);
        if($participant->delete($id)){
            return redirect()
                ->route('mobile.participants.index')
                ->withFlashSuccess('Participante deletado com sucesso');
        }
        return redirect()
            ->route('mobile.participants.index')
            ->withFlashSuccess('Error ao deletar Participante');
    }
}
