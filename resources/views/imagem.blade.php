@extends('layouts.main.app')



@section('content')

<div class="row-justify-content-center">
    <div class="col-8">
        <form  action="{{'imagem'}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" value="">
        <input class="btn btn-primary" type="submit" value="Enviar">    
    </form>
</div>
</div>
@endsection
