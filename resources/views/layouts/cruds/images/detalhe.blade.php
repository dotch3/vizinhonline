@extends('layouts.main.app')



@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Detalhes</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>ID: {{$imagem->id ?? ''}}</td>
    </tr>
    <tr>
      <td>MARCA: {{$imagem->name ?? ''}}</td>
    </tr>
    
    <tr>
      <td>IMAGEM: <img src="\upload\img\{{$imagem->id ?? ''}}"></td>
    </tr>

  </tbody>
</table>
<a href ="{{route('principal')}}">
  <button class="btn btn-primary">Voltar</button>
</a>
<a href ="">
  <button class="btn btn-success">Editar</button>
</a>


@endsection