<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use Gate;

class CuentasController extends Controller
{
    public function authUser(Request $request){
        $user = $request->user;
        $password = $request->password;
        
        if(Auth::attempt(['user'=>$user,'password'=>$password])){
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'user' => 'Credenciales incorrectas, verifiquelas.',
        ])->onlyInput('user');
    }

    public function logoutUser(){
        Auth::logout();
        return redirect()->route('home.login');
    }

}
