<?php

namespace App\Http\Controllers;

use App\Images;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;

class UploadController extends Controller
{

    public function index()
    {
        $images = Images::orderBy('created_at', 'desc')->paginate(10);
        return view('layouts/cruds/images/image', compact('images'));
    }

    public function store(Request $request, $typeObject = false)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            request()->validate([
                'name' => 'required|string|max:80',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'user_id' => 'nullable|integer|'
            ]);
            //Getting info from the image to upload
            if ($typeObject) {
                switch ($typeObject) {
                    case "avatar":
                        echo "avatar";
                        $destinationPath = public_path('/avatar/');
                        $location = '/public/avatar/';
                        break;
                    case "item":
                        echo "item";
                        $destinationPath = public_path('/item/');
                        $location = '/public/item/';
                        break;
                    case "post":
                        echo "post";
                        $destinationPath = public_path('/post/');
                        $location = '/public/post/';
                        break;

                }

            } else {
                $destinationPath = public_path('/avatar/');
                $location = '/public/avatar/';
            }

            $imageName = $request->get('name');
            $imageFormat = $request->image->clientExtension();

            $slug = Str::slug($imageName) . "." . ($imageFormat);


            // Saving the image as object into the database
            $image = new Images([
                'name' => $imageName,
                'path_location' => $destinationPath,
                'slug' => $slug,
                'format_image' => $imageFormat,
                'size_image' => $request->image->getSize(), // Get the size in Bytes
                'user_id' => $request->get('user_id')

            ]);
//            Storage::disk('local')->put($slug, $request->file('image'));
//            Storage::putFile($destinationPath, $request->file('slug'));
//            request()->image->move($destinationPath, $imageName . '.' . $imageFormat);
            //            $imagePath = $request->file('image')->store('public');
////            dd($imagePath);
//            $image = Image::make(Storage::get($imagePath))->resize(320, 240)->encode();
////            Storage::put($slug, $image);
//
//            Storage::put('/public/avatar/',$image, $slug);


            $path = Storage::putFileAs($location, $request->file('image'), $slug);
            if ($path) {
                $image->save();
            }

            return redirect()->route('images.index')
                ->with('alert-success', 'You have successfully upload image.')
                ->with('image', $request->get('name'));
        } else {
            dd($request->get('name'));
        }
    }

    public function edit($id)
    {
        $imagem = Images::find($id);
        return view('layouts.cruds.images.EditarImagem', compact('imagem'));
    }

    public function update(Request $request, $id, $typeObject = false)
    {
        request()->validate([
            'name' => 'required|string|max:80',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'nullable|integer|'
        ]);
        $image = Images::find($id);
        if ($image !== null) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                //Deleting the old image
                if ($typeObject) {
                    switch ($typeObject) {
                        case "avatar":
                            echo "avatar";
                            $destinationPath = public_path('/avatar/');
                            $location = '/public/avatar/';
                            break;
                        case "item":
                            echo "item";
                            $destinationPath = public_path('/item/');
                            $location = '/public/item/';
                            break;
                        case "post":
                            echo "post";
                            $destinationPath = public_path('/post/');
                            $location = '/public/post/';
                            break;
                    }
                } else {
                    $destinationPath = public_path('/avatar/');
                    $location = '/public/avatar/';
                }
                if (Storage::exists($location . $image->slug)) {
                    Storage::delete($location . $image->slug);
                }

                $image->name = Str::slug($request->get('name'));
                $imageFormat = $request->image->clientExtension();
                $image->slug = Str::slug($image->name) . "." . ($imageFormat);
                $image->path_location = $destinationPath . $image->slug;

                Storage::putFileAs($location, $request->file('image'), $image->slug);


                $user = User::find($request->get('user_id'));
                if ($user !== null) {
                    $image->user_id = $user->id;
                }
                // Saving the image as object into the database
                $image->save();


                return redirect()->route('images.index')
                    ->with('alert-success', 'You have successfully updated the image.')
                    ->with('image', $request->get('name'));
            }
        } else {
            return redirect()->route('images.index')
                ->with('errors', 'Image was not updated.');
        }
    }

    public
    function destroy($id, $typeObject = false)
    {
        // Location can change depending on the type of object: user, item, post
        dd($id);
        if ($typeObject) {
            switch ($typeObject) {
                case "avatar":
                    echo "avatar";
                    $location = '/storage/avatar/';
                    break;
                case "item":
                    echo "item";
                    $location = '/storage/item/';
                    break;
                case "post":
                    echo "post";
                    $location = '/storage/post/';
                    break;

            }

        } else {

            $location = '/storage/avatar/';
        }

        $image = Images::findOrFail($id);
        Storage::delete($location . $image->slug);
        $image->delete();

        return redirect()->route('images.index')->with('alert-success', 'Image has been deleted!');

    }
}
