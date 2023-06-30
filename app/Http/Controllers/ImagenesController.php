<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Imagen;
use App\Models\Cuenta;
use App\Http\Requests\ArtistaImagenRequest;
use App\Http\Requests\ArtistaEditImagenRequest;

class ImagenesController extends Controller
{   
    //Artista
    public function artistaCreateImagen(){
        return view('artista.create_imagen');
    }

    public function artistaStoreImagen(ArtistaImagenRequest $request){
        $archivo = $request->archivo;

        $dir = 'public/documentos/img';
        $nombre = $archivo->getClientOriginalName();

        $path = $request->file('archivo')->storeAs($dir, $nombre);

        $imagen = new Imagen();

        $imagen->titulo = $request->titulo;
        $imagen->archivo = $nombre;
        $imagen->cuenta_user = Auth::user()->user;
        $imagen->baneada = false;
        $imagen->motivo_ban = null;

        $imagen->save();

        return redirect()->route('home.index');
    }

    public function artistaDestroyImagen(Imagen $imagen){
        $imagen->delete();
        return redirect()->route('home.index');
    }

    public function artistaEditImagen(Imagen $imagen){
        return view('artista.edit_imagen', compact('imagen'));
    }

    public function artistaUpdateImagen(ArtistaEditImagenRequest $request,Imagen $imagen){
        $imagen->titulo = $request->titulo;

        $imagen->save();

        return redirect()->route('home.index');
    }

    public function publicoShowImagenes(Request $request){
        $userFiltrado = null;
        $imagenesFiltradas = null;
        $users = Cuenta::all();
        $imagenes = Imagen::all();
        
        if($request->user != ''){
            $userFiltrado = Cuenta::where('user', $request->user)->first();
            $imagenesFiltradas = Imagen::where('cuenta_user', $request->user)->get();
        }else{
        
        }
        
        return view('publico.index', compact('users', 'userFiltrado', 'imagenesFiltradas' , 'imagenes'));
    }

    public function adminBanImagen(Request $request, Imagen $imagen){
        $imagen->baneada = 1;
        $imagen->motivo_ban = $request->motivo_ban;

        $imagen->save();

        return redirect()->route('publico.index');
    }

    public function adminUnBanImagen(Imagen $imagen){
        $imagen->baneada = 0;
        $imagen->motivo_ban = null;

        $imagen->save();

        return redirect()->route('publico.index');
    }

}
