@extends('layouts.main.app')



@section('content')

@if ($errors)
@foreach ($errors->all as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
</div>
@endforeach   
@endif
<div class="container cadastro">
<form  method="POST" action="{{route('store')}}" enctype="multipart/form-data" >
<head>
    @csrf
<div class="row no-gutters">
    <div class="col-2  fundo_img">
        <h2>Sua Foto</h2>
    </div>
    <div class="img_upload">
        <input type="file" name="foto">
    </div>
    <div class="col-1">
    </div>    
   
    <div class="col-8" >
        <h2> Cadastro </h2>
       
                <input class= "form-control-2" type="text" name="name" placeholder="Nome da imagem">

                <br/>
                <br>
                <input class="btn btn-primary" type="submit" value="Cadastrar">
                        <!--
                                                    <input class="btn-secundary" type="submit" name="Cadastrar" value="Cadastrar"> -->
                    </div>
                
          
              </form>

              
    </div>
@endsection
    