@extends('layouts.main.app')



@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif

    <div class="container row col-md-12">
        <div class="container col-md-10">
            @if(!empty($imagem->id))
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if(!empty($imagem->slug))
                            {{--                    @elseif(Storage::disk('public')->exists($user->image->name))--}}

                            <img src="{{asset('/storage/avatar/'.$imagem->slug)}}" id="imgProfile" class="profile"
                                 style="width: 180px;height: 170px; ">
                        @else
                            <div class=" fundo_img">

                                <h2>Sua Foto</h2>
                            </div>
                        @endif
                    </div>

                    <div class="container col-md-8">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Detalhes Imagem</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td> ID: <input type="id" class="form-control" id="id"
                                                value="{{ !empty( $imagem->id) ? $imagem->id : '' }} " name="id"
                                                disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Nome: <input type="name" class="form-control" id="name"
                                                 value="{{ !empty( $imagem->name) ? $imagem->name : '' }} " name="name"
                                                 required></td>
                            </tr>
                            <tr>
                                <td>Slug: <input type="slug" class="form-control" id="slug"
                                                 value="{{ !empty( $imagem->slug) ? $imagem->slug : '' }}" name="slug"
                                                 required></td>
                            </tr>

                            <tr>
                                <td>Path: <input type="path_location" class="form-control" id="path_location"
                                                 value="{{ !empty( $imagem->path_location) ? $imagem->path_location : '' }}"
                                                 name="path_location" disabled></td>
                            </tr>
                            <tr>
                                <td>Format image: <input type="format_image" class="form-control" id="format_image"
                                                         value="{{ !empty( $imagem->format_image) ? $imagem->format_image : '' }}"
                                                         name="format_image" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Size image: <input type="size_image" class="form-control" id="size_image"
                                                       value="{{ !empty( $imagem->size_image) ? $imagem->size_image : '' }}"
                                                       name="size_image" disabled></td>
                            </tr>
                            <tr>
                                <td>User Id: <input type="user_id" class="form-control" id="user_id"
                                                    value="{{ !empty( $imagem->user->id) ? $imagem->user->id : '' }}"
                                                    name="user_id" disabled></td>
                            </tr>
                            <tr>
                                <td>User full name: <input type="user_name" class="form-control" id="user_name"
                                                           value="{{ !empty( $imagem->user->id) ? $imagem->user->name." - ".$imagem->user->lastname : '' }}"
                                                           name="user_name" disabled></td>
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
                </div>
        </div>
@endsection
