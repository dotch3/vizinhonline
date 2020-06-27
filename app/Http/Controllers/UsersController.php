<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('layouts.cruds.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rg' => 'required|string|max:50',
            'name' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|string|max:45',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string|max:200',
            'age' => 'nullable|integer|max:255',
            'cpf' => 'nullable|string|max:45',
            'ranking' => 'nullable|integer|max:10',
            'cellphone' => 'nullable|string|max:50',
            'image_id' => 'nullable',
        ]);
        //Validation for password needed
        $user = new User([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'cellphone' => $request->get('cellphone'),
            'rg' => $request->get('rg'),
            'cpf' => $request->get('cpf'),
            'age' => $request->get('age'),
            'ranking' => $request->get('ranking'),
            'image_id' => $request->get('image_id'),
        ]);

        $user->save();
        return redirect()->route('users.index')->with('alert-success', 'User saved!');
    }

    public function create()
    {
        return view('layouts.cruds.users.CreateUser');
    }


    public function show($id)
    {
        $detailsUser = User::findOrFail($id);
        return view('layouts.cruds.users.DetailsUser', compact('detailsUser'));
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
            'rg' => 'required|string|max:50',
            'name' => 'required|string|max:45',
            'lastname' => 'nullable|string|max:45',
            'email' => 'required|string|max:45',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string|max:200',
            'age' => 'nullable|integer|max:255',
            'cpf' => 'nullable|string|max:45',
            'ranking' => 'nullable|integer|max:10',
            'cellphone' => 'nullable|string|max:50',
            'image_id' => 'nullable|integer|',

        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->cellphone = $request->input('cellphone');
        $user->rg = $request->input('rg');
        $user->cpf = $request->input('cpf');
        $user->age = $request->input('age');
        $user->ranking = $request->input('ranking');
        $user->image_id = $request->input('image_id');
        $user->updated_at = now();


        $user->save();

        return redirect()->route('users.index')->with('alert-success', 'User updated!');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('alert-success', 'User has been deleted!');

    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        return view('layouts.users.CadastroUsuario', compact('user'));

    }
}


