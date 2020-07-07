<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::paginate(5);
        return view('layouts.cruds.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateItemsFields($request);

        $item = new Items([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'loan_start_date' => $request->get('loan_start_date'),
            'loan_end_date' => $request->get('loan_end_date')
        ]);

        $item->save();

        $imagePath = '/public/items';
        $imageFile = $request->file('image');
        $imageName = $request->get('name').".".$imageFile->getClientOriginalExtension();
        Storage::putFileAs($imagePath, $imageFile, $imageName);
        $image = new Images([
            'name' => $imageName,
            'path_location' => $imagePath
        ]);

        $image->save();
        $item->images()->attach($image->id);
        return redirect()->route('perfilUsuario');
    }

    public function validateItemsFields($request)
    {
        return $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'loan_start_date' => 'required',
            'loan_end_date' => 'required'
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Section relationships
}
