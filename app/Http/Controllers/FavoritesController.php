<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;

class FavoritesController extends Controller
{
    //
    public function listFavorites()
    {
        $favorites = Favorite::all();
//        return view('layouts/users/PerfilUsuario');
        return view('layouts.favorites.CrudFavorites', ['listFavorites' => $favorites]);
    }


    public function detailFavorite($id_favorite)
    {
//        dd($id_favorite);
        $detailFavorite = Favorite::find($id_favorite);
//        dd($detailFavorite);
        return view('layouts.favorites.DetailFavorite', ['detailFavorite' => $detailFavorite]);
    }

    public function editFavorite($id_favorite)
    {
        $favorite = Favorite::find($id_favorite);
        return view('layouts.favorites.DetailFavorite', ['favorite' => $favorite]);
    }

    public function deleteFavorite($id_favorite)
    {
        $favorite = Favorite::find($id_favorite);
        return view('layouts/favorites/deleteFavorite', ['favorite' => $favorite]);
    }

    //Controlling the CRUD operations

    public function update(Request $request, $id)
    {
        $request->validate([
            //validacao dos campos dos dados do usuario
            'name' => 'nullable|string|max:45',
            'favorite_code' => 'nullable|string|max:45',
            'favorite_status' => 'nullable|string|',
        ]);
        $favorite = Favorite::findOrFail($id);
        $favorite->name = $request->input('name');
        $favorite->favorite_code = $request->input('favorite_code');
        $favorite->favorite_status = $request->input('favorite_status');
        $favorite->save();

        return redirect('/favorites')->with('Success', 'Contact updated!');

    }

}
