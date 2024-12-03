<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students|exists:users',
            'password' => 'required|min:6|max:20',
        ]);
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                        ->withErrors(trans('auth.failed'))
                        ->withInput();
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->intended(route('student.index'))->withSuccess('Signed in');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
        // Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
