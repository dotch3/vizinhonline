<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // Verify if the user logged is registered or not
        if (auth()) {
            $user = User::where('name', 'Fernando')->first();
            return view('layouts/main/Feed', compact('user'));

        }
        return view('layouts/main/Home');
    }

    public function cadastroItem()
    {
        return view('layouts/items/CadastroItem');
    }

    public function perfilUsuario()
    {
        $user = User::where('name', 'Fernando')->first();

        if (!empty($user->id)) {
            return view('layouts/users/PerfilUsuario', compact('user'));
        } else {
            return view('layouts/users/PerfilUsuario', compact('user'));
        }

    }

    public function perfilVizinho()
    {
        $user = User::where('name', 'Marcelo')->first();
        if (!empty($user->id)) {
            return view('layouts/users/PerfilVizinho', compact('user'));
        } else {
            return view('layouts/users/PerfilVizinho', compact('user'));
        }
    }

    public function cadastroUsuario()
    {
        return view('layouts/users/CadastroUsuario');
    }
}
