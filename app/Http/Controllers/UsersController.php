<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('layouts.cruds.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rg' => 'required|string|max:15',
            'name' => 'required|string|max:45',
            'last_name' => 'nullable|string|max:45',
            'username' => 'required|string|max:45',
            'password' => 'nullable|string|max:45',
            'email' => 'nullable|string|max:45',
            'cpf' => 'nullable|string|max:15',
            'age' => 'nullable|integer|max:11',
            'ranking' => 'nullable',
            'cellphone' => 'nullable|string|max:50',
            'image_id' => 'nullable',
        ]);

        $user = new User([
            'rg' => $request->get('rg'),
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'email' => $request->get('email'),
            'cpf' => $request->get('cpf'),
            'age' => $request->get('age'),
            'ranking' => $request->get('ranking'),
            'cellphone' => $request->get('cellphone'),
            'image_id' => $request->get('image_id'),
        ]);
        $user->save();
        return redirect()->route('users.index')->with('success', 'User saved!');
    }

    public function create()
    {
        return view('layouts.cruds.users.CreateUser');
    }


    public function detailsUser($id)
    {
        $detailsUser = User::findOrFail($id);
        return view('layouts.cruds.users.DetailsUser', ['detailsUser' => $detailsUser]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.cruds.users.EditUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //validating the fields
            'rg' => 'required|string|max:15',
            'name' => 'required|string|max:45',
            'last_name' => 'nullable|string|max:45',
            'username' => 'required|string|max:45',
            'password' => 'nullable|string|max:45',
            'email' => 'nullable|string|max:45',
            'cpf' => 'nullable|string|max:15',
            'age' => 'nullable|integer|max:11',
            'ranking' => 'nullable',
            'cellphone' => 'nullable|string|max:50',
            'image_id' => 'nullable',

        ]);

        echo dd($request);
        $user = User::find($id);
        $user->rg = $request->input('rg');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->cpf = $request->input('cpf');
        $user->age = $request->input('age');
        $user->ranking = $request->input('ranking');
        $user->cellphone = $request->input('cellphone');
        $user->image_id = $request->input('image_id');



        $user->save();

        return redirect()->route('users.index')->with('Success', 'User updated!');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('alert-success', 'User has been deleted!');

    }

}
