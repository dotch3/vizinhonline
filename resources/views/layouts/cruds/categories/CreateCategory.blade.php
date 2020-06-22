@extends('layouts.main.app')
@section('title', 'Create Category')
@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-success">Adicionar categoria</span></h4>
            </div>

        </div>

        <div class="container row card">
            <div class="col-sm-8 offset-sm-2">
                <h2 class="display-4">Adicionar categoria</h2>
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
                    <form method="post" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Nome:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>

                        <div class="form-group">
                            <label for="category_code">Código da categoria:</label>
                            <input type="text" class="form-control" name="category_code"/>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>

                        <div class="col-6 btn-group btn-group-lg">
                            <button type="submit" class="btn btn-outline-success btn-lg">Adicionar categoria</button>
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
