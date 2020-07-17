<?php

namespace App\Http\Controllers;


use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
//        dd('Entrou');
        if (Auth::check()) {
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('layouts/main/Feed', compact('posts'));
        } else {
            return view('layouts/main/Home');
        }
    }

    public function cadastroUsuario()
    {
        return view('layouts/users/CadastroUsuario');
    }

    public function postsUsuario($id)
    {
        $user = User::findOrFail($id);
        return view('layouts/posts/PostsUsuario', compact('user'));
    }


    public function favoritesUsuario($id)
    {
        $user = User::find($id);
        return view('layouts/favorites/FavoritesUsuario', compact('user'));
    }

    
    public function perfilUsuario()
    {
        $user = Auth::user();

        if (!empty($user->id)) {
            return view('layouts/users/PerfilUsuario', compact('user'));
        } else {
            return view('layouts/users/PerfilUsuario', compact('user'));
        }

    }
    public function perfilVizinho()
    {
        $user = Auth::user();
        if (!empty($user->id)) {
            return view('layouts/users/PerfilVizinho', compact('user'));
        } else {
            return view('layouts/users/PerfilVizinho', compact('user'));
        }
    }

}
