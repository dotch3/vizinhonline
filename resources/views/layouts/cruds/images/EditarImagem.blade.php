@extends('layouts.main.app')



@section('content')
    <div class="container row col-md-12">
        <div class="container col-md-8">
            @if(!empty($imagem->id))
                <form class="needs-validation border border-secondary" method="POST"
                      action="{{ route('upload.update',$imagem->id)}}" autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Editar Imagem</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> ID: <input type="id" class="form-control" id="id"
                                            value="{{$imagem->id }}" name="id" disabled></td>
                        </tr>
                        <tr>
                            <td>Nome: <input type="name" class="form-control" id="name"
                                             value="{{$imagem->name }}" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Slug: <input type="slug" class="form-control" id="slug"
                                             value="{{$imagem->slug }}" name="slug" required></td>
                        </tr>

                        <tr>
                            <td>Path: <input type="path_location" class="form-control" id="path_location"
                                             value="{{$imagem->path_location }}" name="path_location" disabled></td>
                        </tr>
                        <tr>
                            <td>Format image: <input type="format_image" class="form-control" id="format_image"
                                                     value="{{$imagem->format_image }}" name="format_image" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Size image: <input type="size_image" class="form-control" id="size_image"
                                                   value="{{$imagem->size_image }}" name="size_image" disabled></td>
                        </tr>


                        </tbody>
                        @else
                            <p>Nao ha informaçao da imagem</p>
                        @endif
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                            </div>

                            <div class="col-6 btn-group btn-group-lg">
                                <button type="button" class="btn btn-secondary btn-lg " onclick="
                                    window.location.href='{{ route('images.index')}}'"
                                >Voltar
                                </button>
                                <button class="btn btn-warning btn-lg " type="submit">Editar</button>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>


@endsection
