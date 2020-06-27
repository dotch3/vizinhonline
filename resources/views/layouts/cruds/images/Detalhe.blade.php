@extends('layouts.main.app')



@section('content')
    <div class="container row col-md-12">
        <div class="container col-md-8">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Detalhes Imagem</th>
                </tr>
                </thead>
                @if(!empty($imagem->id))
                    <tbody>

                    <tr>
                        <td>ID: {{$imagem->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome: {{$imagem->name }}</td>
                    </tr>
                    <tr>
                        <td>Slug: {{$imagem->slug }}</td>
                    </tr>

                    <tr>
                        <td>Path: {{$imagem->path_location }}</td>
                    </tr>
                    <tr>
                        <td>Format image: {{$imagem->format_image }}</td>
                    </tr>
                    <tr>
                        <td>Size image: {{$imagem->size_image }}</td>
                    </tr>


                    </tbody>
                @else
                    <p>Nao ha informaçao da imagem</p>
                @endif
            </table>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                    </div>

                    <div class="col-6 btn-group btn-group-lg">
                        <button type="button" class="btn btn-secondary btn-lg " onclick="
                            window.location.href='{{ route('images.index')}}'"
                        >Voltar
                        </button>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
            </div>

        </div>
        <div class="container col-md-4">
            <p>Imagem expandida aqui</p>
        </div>
    </div>
@endsection
