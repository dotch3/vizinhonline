<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $favorites = Favorite::all();
        return view('layouts.cruds.favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.cruds.favorites.CreateFavorite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect(route('favorites.index'))->with('alert-success', 'Favorite created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favorite = Favorite::findOrFail($id);
        return view('layouts.cruds.favorites.EditFavorite', compact('favorite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

//        return redirect()->route('favorites.index')->with('Success', 'Contact updated!');
        return redirect(route('favorites.index'))->with('alert-success', 'Favorite updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
        return redirect()->route('favorites.index')->with('alert-success', 'Favorite has been deleted!');
    }

    public function detailFavorite($id_favorite)
    {
        $detailFavorite = Favorite::findOrFail($id_favorite);
        return view('layouts.cruds.favorites.DetailFavorite', ['detailFavorite' => $detailFavorite]);
    }
}
