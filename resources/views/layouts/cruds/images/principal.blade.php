@extends('layouts.main.app')



@section('content')

@if (session('successMsg'))
<div class="alert alert-success" role="alert">
  {{session('successMsg')}}

</div>
@endif
<div class="col-10 m-auto container">
<table class="table">
<thead>
<tr class="text-center">
  <th scope="col">Id</th>
  <th scope="col">Nome</th>
  <th scope="col">Imagem</th>
  <th scope="col">Ações<th>
</tr>
</thead>
<tbody>
@foreach ($imagens->all(); as $imagem)
<tr>
  <td>{{$imagem->id}}</td>
  <td>{{$imagem->name}}</td>
  <td>{{$imagem->path_location}}</td>
  <td class="text-right"> 
  <a href ="{{route('create')}}">
        <button class="btn btn-outline-secondary">Cadastrar</button>
    </a> 
  <a href ="{{route('show',$imagem->id)}}">
        <button class="btn btn-outline-info">Visualizar</button>
    </a>
    <a href ="">
        <button class="btn btn-outline-dark">Editar</button>
    </a>

  
    <a href ="">
        <button class="btn btn-outline-danger">Deletar</button>
    </button>     
    </a>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection