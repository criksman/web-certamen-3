<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminCuentasRequest;
use App\Http\Requests\AdminEditCuentasRequest;
use App\Http\Requests\ArtistaCuentaRequest;
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

    //Admin
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
        $isUser = Auth::user()->user == $user->user;
        
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->perfil_id = $request->perfil_id;

        $user->save();

        if($isUser){
            Auth::logout();
            return redirect()->route('home.login');
        }
        
        return redirect()->route('admin.index');
    }
    
    //Artista
    public function artistaCreateUser(){
        return view('artista.create_user');
    }

    public function artistaStoreUser(ArtistaCuentaRequest $request){
        $user = new Cuenta();

        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->perfil_id = 2;

        $user->save();

        return redirect()->route('home.login');
    }

    public function publicoStoreLoginUser(){
        $user = new Cuenta();
        $username = 'guest_' . uniqid();
        $password = bcrypt('contraseña');

        $user->user = $username;
        $user->password = $password;
        $user->nombre = "none";
        $user->apellido = "none";
        $user->perfil_id = 3;

        if ($user->save()) {
            Auth::login($user);
            return redirect()->route('publico.index');
        } else {
            return redirect()->route('home.login');
        }
    }

    public function publicoDestroyLogoutUser(){
        Auth::user()->delete();
        Auth::logout();

        return redirect()->route('home.login');
    }

}
