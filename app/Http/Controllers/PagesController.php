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
        if (Auth::check()) { //TODO: trabalhar a parte de auth
            $posts = Post::orderBy('created_at', 'desc')->get();
//                dd(count($posts));
//            }
            return view('layouts/main/Feed', compact('posts'));
        } else {
            return view('layouts/main/Home');
        }
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

    public function postsUsuario($id)
    {
        $user = User::find($id);
//        $user = User::where('name', 'Fernando')->first();


        return view('layouts/posts/PostsUsuario', compact('user'));
    }


    public function favoritesUsuario($id)
    {
        $user = User::find($id);
        return view('layouts/favorites/FavoritesUsuario', compact('user'));
    }
}
