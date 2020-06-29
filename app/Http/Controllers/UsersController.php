<?php

namespace App\Http\Controllers;

use App\Images;
use App\Locations;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;


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
//            'image_id' => 'nullable',
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
//            'image_id' => $request->get('image_id'),
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
//            'image_id' => 'nullable|integer|',

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
//        $user->image_id = $request->input('image_id');
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

    // Loads the user profile page
    public function profile($id)
    {
        $user = User::findOrFail($id);

        return view('layouts.users.CadastroUsuario', compact('user'));
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            //validating the user fields
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
            //Validating the location fields
            'building' => 'nullable|string|max:45',
            'apartment_number' => 'required|integer|max:10000',
            'address' => 'nullable|string|max:10',
            'build' => 'nullable|string|max:45',


        ]);

        //validating the image fields
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image_name' => 'nullable|string|max:80',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

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
        $user->image->id = $request->input('image_id');
        $user->updated_at = now();

        // Updating Location for the user

        // If user has not location -> create
        if ($user->location === null) {
            $location = new  Locations([
                'building' => $request->get('building'),
                'apartment_number' => $request->get('apartment_number'),
                'address' => $request->get('address'),
                'intercom_branch' => $request->get('intercom_branch'),
                'user_id' => $user->id,
            ]);

            $location->save();
            $user->save();
        } // If user has location -> update
        else {
            $user->location->update([
                'building' => $request->get('building'),
                'apartment_number' => $request->get('apartment_number'),
                'address' => $request->get('address'),
                'intercom_branch' => $request->get('intercom_branch'),
            ]);
            $user->save();
//            dd($user->location);
        }


        //Saving relationship declaration
        // user hasOne location

//        $user->location->update();


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $imagem = Images::findOrFail($user->image->id);
            $imagem->name = Str::slug($user->name);
            $imagem->format_image = $request->image->clientExtension();
            $imagem->size_image = $request->image->getSize();

            $imagem->path_location = public_path('/public/avatar/');
            $imagem->slug = Str::slug($imagem->name) . "." . ($imagem->format_image);

            //Saving reverse relationsnhip declaration
            // User belongsTo imagem -> need to change this in database later
            $user->image()->associate($imagem);
        }
        return redirect()->route('users.register', $user->id)->with('alert-success', 'Usuario atualizado corretamente!');
    }
}


