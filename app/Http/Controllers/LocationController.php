<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Locations::orderBy('created_at', 'desc')->paginate(10);
        return view('layouts.cruds.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.cruds.locations.CreateLocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations = new Locations;
        $locations->building = $request->building;
        $locations->apartment_number = $request->apartment_number;
        $locations->address = $request->address;
        $locations->intercom_branch = $request->intercom_branch;
        $locations->user_id = $request->user_id;
        $locations->save();
        return redirect()->route('locations.index')->with('message', 'Endereço salvo corretamente!');
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
        $locations = Locations::findOrFail($id);
        return view('locations.index', compact('locations'));
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
        $locations = Locations::findOrFail($id);
        $locations->building = $request->building;
        $locations->apartment_number = $request->apartment_number;
        $locations->address = $request->address;
        $locations->intercom_branch = $request->intercom_branch;
        $locations->user_id = $request->user_id;
        $locations->save();
        return redirect()->route('locations.index')->with('message', 'Endereço atualizado corretamente!');
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
        return redirect()->route('locations.index')->with('alert-success', 'Endereço foi apagado!');
    }
}
