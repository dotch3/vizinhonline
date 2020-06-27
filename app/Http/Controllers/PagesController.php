<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // Verify if the user logged is registered or not
        if (auth()) {

            return view('layouts/main/Feed');

        }
        return view('layouts/main/Home');
    }

    public function cadastroItem()
    {
        return view('layouts/items/CadastroItem');
    }

    public function perfilUsuario()
    {
        if (auth()) {
            return view('layouts/users/PerfilUsuario');
        } else {
            return view('layouts/users/PerfilVizinho');

        }
    }

    public function perfilVizinho()
    {
        return view('layouts/users/PerfilVizinho');
    }

    public function cadastroUsuario()
    {
        return view('layouts/users/CadastroUsuario');
    }
}
