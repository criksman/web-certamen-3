<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminCuentasRequest;
use App\Http\Requests\AdminEditCuentasRequest;
use Gate;

class CuentasController extends Controller
{
    //Login
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

    //Admin funciones
    public function adminIndex(){
        $users = Cuenta::all();
        return view('admin.index', compact('users'));
    }

    public function adminDeleteUser(Cuenta $user){
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function adminCreateUser(){
        return view('admin.create_user');
    }

    public function adminStoreUser(AdminCuentasRequest $request){
        $user = new Cuenta();
        
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->perfil_id = $request->perfil_id;

        $user->save();

        return redirect()->route('admin.index');
    }

    public function adminEditUser(Cuenta $user){
        return view('admin.edit_user', compact('user'));
    }

    public function adminUpdateUser(AdminEditCuentasRequest $request,Cuenta $user){
        //chequear comentario en el request "AdminEditCuentasRequest"

        $user->user = $request->user;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->perfil_id = $request->perfil_id;

        $user->save();
        
        return redirect()->route('admin.index');
    }

}
