<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\User;
use App\Items;
use App\Post;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $favorites = Favorite::paginate(5);
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
            'description' => 'nullable',
            'code' => 'nullable',
            'status' => 'nullable'
        ]);

        $favorite = new Favorite([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'code' => $request->get('code'),
            'status' => $request->get('status'),

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
    public function show($id_favorite)
    {
        $detailFavorite = Favorite::findOrFail($id_favorite);
        return view('layouts.cruds.favorites.DetailFavorite', ['detailFavorite' => $detailFavorite]);
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
            'description' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:45',
            'status' => 'nullable|string|max:45',
        ]);
        $favorite = Favorite::find($id);
        $favorite->name = $request->input('name');
        $favorite->description = $request->input('description');
        $favorite->code = $request->input('code');
        $favorite->status = $request->input('status');
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


}
