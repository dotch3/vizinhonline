<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;

class imagemControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagens = Images::all();
        return view ('layouts/cruds/images/principal', compact('imagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagens = Images::all();
        return view ('layouts/cruds/images/cadastro-imagem', compact('imagens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'foto' => 'required',
        ]);
           
        $imagem = new Images;
        $imagem->name = $request->name;
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('upload/img/',$filename);
            $imagem->path_location = $filename;
        }else{
            return $request;
            $imagem->path_location = '';

        }
        $imagem->save();
        return view(route('store'))->with('successMsg','Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagem = Images::find($id);
        return view ('show',compact('imagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
