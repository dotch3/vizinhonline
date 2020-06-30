@extends('layouts.main.app')

@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    @if ($errors)
        @foreach ($errors->all as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <div class="container row col-md-12">
        <div class="container col-md-12">
            @if(!empty($imagem->id))
                <form class="needs-validation  border-secondary"
                      enctype="multipart/form-data"
                      method="POST"
                      action="{{ route('upload.update',$imagem->id)}}"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @if(!empty($imagem->slug))
                                <img src="{{asset('/storage/avatar/'.$imagem->slug)}}" id="imgProfile" class="profile"
                                     style="width: 180px;height: 170px; ">
                            @else
                                <div class=" fundo_img">

                                    <h2>Sua Foto</h2>
                                </div>
                            @endif
                            <div class="profile-img img_upload">
                                <input type="file" multiple accept='image/*' name="image" id="image"
                                >
                            </div>
                            <script
                                src="https://code.jquery.com/jquery-3.5.1.min.js"
                                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                                crossorigin="anonymous"></script>
                            <script>
                                $(function () {
                                    $('#image').change(function () {
                                        const file = $(this)[0].files[0];
                                        console.log(file);
                                        const fileReader = new FileReader();
                                        fileReader.onloadend = function () {
                                            $('#imgProfile').attr('src', fileReader.result)
                                        }
                                        fileReader.readAsDataURL(file)
                                    })
                                })
                            </script>
                        </div>

                        <div class="col-md-8">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Editar Imagem</th>
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
                                                     value="{{ !empty( $imagem->name) ? $imagem->name : '' }} "
                                                     name="name"
                                                     required></td>
                                </tr>
                                <tr>
                                    <td>Slug: <input type="slug" class="form-control" id="slug"
                                                     value="{{ !empty( $imagem->slug) ? $imagem->slug : '' }}"
                                                     name="slug"
                                                     required></td>
                                </tr>

                                <tr>
                                    <td>Path: <input type="path_location" class="form-control" id="path_location"
                                                     value="{{ !empty( $imagem->path_location) ? $imagem->path_location : '' }}"
                                                     name="path_location"></td>
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
                                                        name="user_id"></td>
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
                        </div>
                    </div>
                </form>
        </div>

    </div>


@endsection
