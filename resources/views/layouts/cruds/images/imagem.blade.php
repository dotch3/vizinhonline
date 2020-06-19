@extends('layouts.main.app')



@section('content')

    <div class="row-justify-content-center">
        <div class="panel-body">


            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

                <img src="images/{{ Session::get('image') }}">

            @endif



            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="col-8">
                <form action="{{route('image.upload')}}" id="formImg" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control">
                    <label for="description">Description</label>
                    <textarea name="description" rows="5" cols="4" class="form-control"></textarea>
                    <input type="file" name="image" accept="image/* " class="form-control">
                    <input class="btn btn-primary" type="submit" value="Enviar">
                </form>
            </div>
        </div>
@endsection
