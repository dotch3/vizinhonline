<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('layouts.cruds.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        //Need to review the validations against the database
//        $request->validate([
//            'rg' => 'required|string|max:15',
//            'name' => 'required|string|max:45',
//            'last_name' => 'nullable|string|max:45',
//            'username' => 'required|string|max:45',
//            'password' => 'nullable|string|max:45',
//            'email' => 'nullable|string|max:45',
//            'cpf' => 'nullable|string|max:15',
//            'age' => 'nullable|integer|max:11',
//            'ranking' => 'nullable',
//            'cellphone' => 'nullable|string|max:50',
//            'image_id' => 'nullable',
//        ]);
//        dd($request);
        $user = new User([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'rg' => $request->get('rg'),
            'cpf' => $request->get('cpf'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
//            'username' => $request->get('username'),
            'age' => $request->get('age'),
            'cellphone' => $request->get('cellphone'),
            'ranking' => $request->get('ranking'),
            'image_id' => $request->get('image_id'),
        ]);
        dd($user);
        $user->save();
        return redirect()->route('users.index')->with('alert-success', 'User saved!');
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
//        Need to review the validations against the database
//    {  dd($request);
//        $request->validate([
//            //validating the fields
//            'rg' => 'required|string|max:15',
//            'name' => 'required|string|max:45',
//            'last_name' => 'nullable|string|max:45',
//            'username' => 'required|string|max:45',
//            'password' => 'nullable|string|max:45',
//            'email' => 'nullable|string|max:45',
//            'cpf' => 'nullable|string|max:15',
//            'age' => 'nullable|integer|max:11',
//            'ranking' => 'nullable',
//            'cellphone' => 'nullable|string|max:50',
//            'image_id' => 'nullable',
//
//        ]);
        $user = User::find($id);
        $user->rg = $request->input('rg');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
//        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->cpf = $request->input('cpf');
        $user->age = $request->input('age');
        $user->ranking = $request->input('ranking');
        $user->cellphone = $request->input('cellphone');
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

}
