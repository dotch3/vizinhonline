@extends('layouts.main.app')
@section('title', 'Create Favorite')
@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-success">Create Favorite</span></h4>
            </div>

        </div>

        <div class="container row card">
            <div class="col-sm-8 offset-sm-2">
                <h2 class="display-4">Add a Favorite</h2>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif
                    <form method="post" action="{{ route('favorites.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>

                        <div class="form-group">
                            <label for="favorite_code">favorite_code:</label>
                            <input type="text" class="form-control" name="favorite_code"/>
                        </div>

                        <div class="form-group">
                            <label for="favorite_status">favorite_status:</label>
                            <input type="text" class="form-control" name="favorite_status"/>
                        </div>


                        <div class="col-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/favorites'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>
                            <button type="submit" class="btn btn-outline-success btn-lg">Add Favorite</button>

                        </div>
                        <div class="col-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
