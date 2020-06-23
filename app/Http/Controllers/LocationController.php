<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Locations = Locations::orderBy('created_at', 'desc')->paginate(10);
        return view('Locations.index', ['Locations' => $Locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Locations = new Locations;
        $Locations->name = $request->name;
        $Locations->description = $request->description;
        $Locations->save();
        return redirect()->route('Locations.index')->with('message', 'Endereço salvo corretamente!');
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
        $Locations = Locations::findOrFail($id);
        return view('Locations.edit', compact('Locations'));
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
        $Locations = Locations::findOrFail($id);
        $Locations->name = $request->name;
        $Locations->description = $request->description;
        $Locations->save();
        return redirect()->route('Locations.index')->with('message', 'Endereço atualizado corretamente!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Locations = Locations::findOrFail($id);
        $Locations->delete();
        return redirect()->route('Locations.index')->with('alert-success', 'Endereço foi apagado!');
    }
}
