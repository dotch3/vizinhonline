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
        $request->validate([
            'building' => 'required|string|max:45',
            'apartment_number' => 'required|integer',
            'address' => 'nullable|string|max:45',
            'intercom_branch' => 'nullable|integer',
            'user_id' => 'required|integer'
        ]);

        $locations = new Locations;
        $locations->building = $request->building;
        $locations->apartment_number = $request->apartment_number;
        $locations->address = $request->address;
        $locations->intercom_branch = $request->intercom_branch;
        $locations->user_id = $request->user_id;
        $locations->save();
        return redirect()->route('locations.index')->with('alert-success', 'Endereço salvo corretamente!');
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
        $location = Locations::findOrFail($id);
        return view('layouts.cruds.locations.EditLocation', compact('location'));
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
            'building' => 'required|string|max:45',
            'apartment_number' => 'required|integer',
            'address' => 'nullable|string|max:45',
            'intercom_branch' => 'nullable|integer',
            'user_id' => 'required|integer'
        ]);
        $location = Locations::findOrFail($id);
        $location->building = $request->building;
        $location->apartment_number = $request->apartment_number;
        $location->address = $request->address;
        $location->intercom_branch = $request->intercom_branch;
        $location->user_id = $request->user_id;
        $location->save();
        return redirect()->route('locations.index')->with('alert-success', 'Endereço atualizado corretamente!');
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
