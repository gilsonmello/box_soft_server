<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Requests\Mobile\Auth\AuthCreateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(AuthRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('mobile.home');
        }

        return redirect()
            ->route('mobile.auth.index')
            ->withInput()
            ->withFlashDanger('Dados Inválidos');
    }

    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('mobile.auth.index');
    }

    public function register(AuthCreateRequest $request)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.mobile.auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.mobile.auth_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthCreateRequest $request)
    {;
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->remember_token = str_random(10);

        if($user->save()) {
            Auth::login($user);
            return redirect()->route('mobile.home');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
