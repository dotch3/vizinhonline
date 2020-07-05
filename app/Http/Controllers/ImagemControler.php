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
        $imagens = Images::orderBy('created_at', 'desc')->paginate(10);
        return view('layouts/cruds/images/Index', compact('imagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/cruds/images/CadastroImagem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'foto' => 'required',
        ]);

        $imagem = new Images;
        $imagem->name = $request->name;
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('img/avatar/', $filename);
            $imagem->path_location = $filename;
        } else {
            return $request;
            $imagem->path_location = '';

        }
        $imagem->save();
        return view(route('images.index'))->with('alert-success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagem = Images::find($id);
        return view('layouts.cruds.images.DetalheImagem', compact('imagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagem = Images::find($id);
        return view('layouts.cruds.images.EditarImagem', compact('imagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Images::findOrFail($id);
        $image->delete();
        return redirect()->route('images.index')->with('alert-success', 'Image has been deleted!');

    }
}
