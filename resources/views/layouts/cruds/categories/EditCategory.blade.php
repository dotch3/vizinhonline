@extends('layouts.main.app')
@section('title', 'Categorie')


@section('content')


    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-warning">Editar categoria</span></h4>
            </div>

        </div>


        <div class="container col-md-12 mb-3 ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form class="needs-validation border border-secondary" method="POST"
                action="{{ route('categories.update',$category->id_category)}}" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="form-row container">

                    <div class="col-md-2 mb-3">
                        <label for="id">ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend"># </span>
                            </div>
                            <input type="text" class="form-control" id="id"
                                   value="{{ $category->id_category }}"
                                   disabled required>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name"
                               value="{{$category->name}}" name="name"
                               required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="category_code">Código da categoria</label>
                        <input type="text" class="form-control" id="category_code"
                               value="{{$category->category_code}}" name="category_code" required>
                    </div>
                </div>
                <div class="form-row container">

                    <div class="col mb-3">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" name="description" id="description">{{ $category->description }}</textarea>
                    </div>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-3">
                        </div>

                        <div class="col-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/categories'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>

                            <button class="btn btn-outline-warning btn-lg " type="submit">Editar</button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
