<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function enviarImagem(Request $request)
    {
//        if ($request->method('GET'))
//        return view ('imagem');
//        $nome = $request->file('file')->getClientOriginalName();
//        $save = $request->file('file')->storeAs('public/img',$nome);
//        $urlBase ='storage/img/'.$nome;
//        return view ('imagem', ['linkimg=>$urlBase']);
//    }


        if ($request->hasfile('image')) {
            $request->validate([
                    'name' => 'required|string|max:100',
                    'description' => 'required|string|max:100',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'path_location' => 'required|string|max:100',
                    'format_image' => 'required|string|max:100',
                    'size_image' => 'required|float']
            );
            //Creating the new object
            $image = new Images([
                $image = $request->file('image'),
                $image = $request->file('image'),
                $image = $request->file('image'),

                $imageName = time() . '.' . $image->getClientOriginalExtension()]);
            request()->image->move(public_path('uploads'), $imageName);

            //Saving the object
            $image->save();
            return back()
                ->with('success', 'You have successfully upload image.')
                ->with('image', $imageName);
        }

    }
}

