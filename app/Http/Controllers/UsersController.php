<?php

namespace App\Http\Controllers;

use App\Images;
use App\Locations;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
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

        return view('layouts.users.EditarUsuario', compact('user'));
    }

    //Create a new user profile that would have 3 objects: User, Locaton, Image
    public function new(Request $request)
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
            'address' => 'nullable|string|max:45',
            'build' => 'nullable|string|max:45',


        ]);

        //validating the image fields
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image_name' => 'nullable|string|max:80',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        // Creating new User

        $user = new User([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => Hash::make( $request->get('password')),
            'cellphone' => $request->get('cellphone'),
            'rg' => $request->get('rg'),
            'cpf' => $request->get('cpf'),
            'age' => $request->get('age'),

        ]);

        $user->save();

        $location = new  Locations([
            'building' => $request->get('building'),
            'apartment_number' => $request->get('apartment_number'),
            'address' => $request->get('address'),
            'intercom_branch' => $request->get('intercom_branch'),
            'user_id' => $user->id,
        ]);
        $user->location()->save($location);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Getting info from the image to upload
            $destinationPath = public_path('/avatar/');
            $imageName = Str::slug($user->name . "-" . $user->lastname);
            $imageFormat = $request->image->clientExtension();

            $slug = Str::slug($imageName) . "." . ($imageFormat);


            // Saving the image as object into the database
            $image = new Images([
                'name' => $imageName,
                'path_location' => $destinationPath . $slug,
                'slug' => $slug,
                'format_image' => $imageFormat,
                'size_image' => $request->image->getSize(), // Get the size in Bytes
                'user_id' => $user->id
            ]);

            $location = '/public/avatar/';

            $path = Storage::putFileAs($location, $request->file('image'), $slug);
            if ($path) {
                $image->save();
            }

            $user->image()->save($image);
        }
        return redirect()->route('users.profile', $user->id)->with('alert-success', 'Usuario criado corretamente!');
    }

// Updating the entire profile of a registered user
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
            'address' => 'nullable|string|max:45',
            'build' => 'nullable|string|max:45',


        ]);

        //validating the image fields
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image_name' => 'nullable|string|max:80',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        // Creating or updating the User data

        $user = User::find($id);
        //Updating the user info
        if ($user->id !== null) {
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->cellphone = $request->input('cellphone');
            $user->rg = $request->input('rg');
            $user->cpf = $request->input('cpf');
            $user->age = $request->input('age');
            $user->ranking = $request->input('ranking');
//            $user->save();
        }

        //Updating the image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($user->image) {
                $image = Images::find($user->image->id);
                //Deleting the old image
                if (Storage::exists('/public/avatar/' . $user->image->slug)) {
                    Storage::delete('/public/avatar/' . $user->image->slug);
                }


                $destinationPath = public_path('/avatar/');
                $image->name = Str::slug($request->get('name'));
                $imageFormat = $request->image->clientExtension();
                $image->slug = Str::slug($image->name) . "." . ($imageFormat);
                $image->path_location = $destinationPath . $image->slug;

                $location = '/public/avatar/';
                Storage::putFileAs($location, $request->file('image'), $image->slug);

                //Saving reverse relationsnhip declaration
                // User belongsTo imagem -> need to change this in database later
                $image->save();

//            dd($image, $user, $user->location);
            } else {
                $destinationPath = public_path('/avatar/');
                $imageName = Str::slug($user->name . "-" . $user->lastname);
                $imageFormat = $request->image->clientExtension();

                $slug = Str::slug($imageName) . "." . ($imageFormat);

                // Saving the image as object into the database
                $image = new Images([
                    'name' => $imageName,
                    'path_location' => $destinationPath . $slug,
                    'slug' => $slug,
                    'format_image' => $imageFormat,
                    'size_image' => $request->image->getSize(), // Get the size in Bytes
                    'user_id' => $user->id
                ]);

                $location = '/public/avatar/';

                $path = Storage::putFileAs($location, $request->file('image'), $slug);
                if ($path) {
                    $image->save();
                }

                $user->image()->save($image);
            }

        }

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
        }


        return redirect()->route('users.register', $user->id)->with('alert-success', 'Usuario atualizado corretamente!');
    }

    //Function to add comments on the posts


}


