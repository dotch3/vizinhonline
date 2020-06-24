<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function index()
    {
        $images = Images::all();
        return view('layouts/cruds/images/image', compact('images'));
    }

    public function imageUploadProfile(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            request()->validate([
                'name' => 'required|string|max:80',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //Getting info from the image to upload
            $destinationPath = public_path('/img/avatar/');
            $imageName = $request->get('name');
            $imageFormat = $request->image->clientExtension();



            // Saving the image as object into the database
            $image = new Images([
                'name' => $imageName,
                'path_location' => $destinationPath,
                'format_image' => $imageFormat,
                'size_image' => $request->image->getSize(), // Get the size in Bytes

            ]);
            
//            dd($image);
            $image->save();
            request()->image->move($destinationPath, $imageName . '.' . $imageFormat);
            return back()
                ->with('success', 'You have successfully upload image.')
                ->with('image', $request->get('name'));
        }
    }

}