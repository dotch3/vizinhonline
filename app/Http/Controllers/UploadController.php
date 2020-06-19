<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function enviarImagem(Request $request){
        if ($request->method('GET'))
        return view ('imagem');
        $nome = $request->file('file')->getClientOriginalName();
        $save = $request->file('file')->storeAs('public/img',$nome);
        $urlBase ='storage/img/'.$nome;
        return view ('imagem', ['linkimg=>$urlBase']);
    }

}

