<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;

class UploadController extends Controller
{

    public function index()
    {
        $images = Images::all();
        return view('layouts/cruds/images/image', compact('images'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            request()->validate([
                'name' => 'required|string|max:80',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //Getting info from the image to upload
            $destinationPath = public_path('/public/avatar/');
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
            $location = '/public/avatar/';

            $path = Storage::putFileAs($location, $request->file('image'), $slug);
            if ($path) {
                $image->save();
            }

            return redirect()->route('images.index')
                ->with('success', 'You have successfully upload image.')
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

    public function update(Request $request, $id)
    {

        request()->validate([
            'name' => 'required|string|max:80',
        ]);

        $image = Images::find($id);
        $image->name = $request->input('name');
        // Saving the image as object into the database
        $image = new Images([
            'name' => $image->name,
            'path_location' => $image->path_location,
            'format_image' => $image->format_image,
            'size_image' => $image->size_image
        ]);

//            dd($image);
        $image->save();
        return redirect()->route('images.index')
            ->with('success', 'You have successfully updated the image.')
            ->with('image', $request->get('name'));

    }

    public function destroy($id)
    {
        // Location can change depending on the type of object: user, item, post
        $location = '/public/avatar/';
        $image = Images::findOrFail($id);
        Storage::delete($location . $image->slug);
        $image->delete();

        return redirect()->route('images.index')->with('alert-success', 'Image has been deleted!');

    }
}
