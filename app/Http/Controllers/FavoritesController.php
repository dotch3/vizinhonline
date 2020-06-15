<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;

class FavoritesController extends Controller
{
    //
    public function index()
    {
        $favorites = Favorite::all();
        return view('layouts.cruds.favorites.CrudFavorites', compact('favorites'));
    }

    //Controlling the CRUD operations
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'favorite_code' => 'nullable',
            'favorite_status' => 'nullable'
        ]);

        $favorite = new Favorite([
            'name' => $request->get('name'),
            'favorite_code' => $request->get('favorite_code'),
            'favorite_status' => $request->get('favorite_status'),

        ]);
        $favorite->save();
        return redirect()->route('favorites.index')->with('success', 'Favorite saved!');
    }

    public function create()
    {
        return view('layouts.cruds.favorites.CreateFavorite');
    }


    public function detailFavorite($id_favorite)
    {
        $detailFavorite = Favorite::findOrFail($id_favorite);
        return view('layouts.cruds.favorites.DetailFavorite', ['detailFavorite' => $detailFavorite]);
    }

    public function edit($id)
    {
        $favorite = Favorite::findOrFail($id);
        return view('layouts.cruds.favorites.EditFavorite', compact('favorite'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:45',
            'favorite_code' => 'nullable|string|max:45',
            'favorite_status' => 'nullable|string|',
        ]);
        $favorite = Favorite::find($id);
        $favorite->name = $request->input('name');
        $favorite->favorite_code = $request->input('favorite_code');
        $favorite->favorite_status = $request->input('favorite_status');
        $favorite->save();

        return redirect()->route('favorites.index')->with('Success', 'Contact updated!');

    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
        return redirect()->route('favorites.index')->with('alert-success', 'Favorite has been deleted!');

    }


}
