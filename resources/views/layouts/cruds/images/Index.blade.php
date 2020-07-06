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
    <div class="container cadastro">
        <form id="signin" class="needs-validation  border-secondary" enctype="multipart/form-data"
              method="post" action="{{route('upload.store')}}"
              autocomplete="off">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-4">
                @if(!auth()->user())<!--auth()->user()->image!=null-->
                    {{--                    @elseif(Storage::disk('public')->exists('/avatar/jorgito.png'))--}}
                    <img src="{{asset('/storage/avatar/fundo.png')}}" id="imgProfile" class="profile"
                         style="width: 180px;height: 170px; ">
                    @else
                        <div class=" fundo_img">

                            <h2>Sua Foto</h2>
                        </div>
                    @endif

                </div>
                <div class="profile-img img_upload">
                    <input type="file" name="image" id="image" multiple accept='image/*' size='50'>
                </div>
                <script
                    src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous"></script>
                <script>
                    $(function () {
                        $('#image').change(function () {
                            const image = $(this)[0].files[0];
                            console.log(image);
                            const fileReader = new FileReader();
                            fileReader.onloadend = function () {
                                $('#imgProfile').attr('src', fileReader.result)
                            }
                            fileReader.readAsDataURL(image)
                        })
                    })
                </script>
                <div class="col-8">
                    <h2> Cadastro </h2>

                    <input class="form-control-2" type="text" name="name" placeholder="Nome da imagem" required>
                    <br/>
                    <br/>
                    <input class="form-control-2" type="text" name="user_id" placeholder="User ID">
                    <br/>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Cadastrar">
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="col-10 m-auto container">
        <table class="table table-bordered table table-striped text-center">
            <thead>
            <tr class="text-center">
                <th scope="text-center">Id</th>
                <th scope="text-center">Nome</th>
                <th scope="text-center">slug</th>
                <th scope="text-center">Path</th>
                <th scope="text-center">format_image</th>
                <th scope="text-center">size_image</th>
                <th scope="text-center">user</th>
                <th scope="text-center">post</th>
                <th scope="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imagens as $imagem)
                <tr>
                    <td>{{$imagem->id}}</td>
                    <td>{{$imagem->name}}</td>
                    <td>{{$imagem->slug}}</td>
                    <td>-</td>
                    <td>{{$imagem->format_image}}</td>
                    <td>{{$imagem->size_image}}</td>
                    <td>{{ !empty($imagem->user) ? "#".$imagem->user->id." ".$imagem->user->name: '' }}</td>
                    <td>{{ !empty( $imagem->post) ? "#".$imagem->post->id." ".$imagem->post->title: '' }}</td>
                    <td class="text-right">
                        <a href="{{route('images.show',$imagem->id)}}">
                            <button class="btn btn-outline-info">Visualizar</button>
                        </a>
                        <a href="{{route ('upload.edit',$imagem->id)}}">
                            <button class="btn btn-outline-dark">Editar</button>
                        </a>
                        <form method="post" id="delete-form-{{$imagem->id}}"
                              action="{{ route('images.destroy', $imagem->id)}}"
                              style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="if (confirm('Are you sure you want delete this data?')) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$imagem->id}}').submit();
                            }else{
                            event.preventDefault();
                            }
                            " class="btn btn-outline-danger btn-rounded " href="">Eliminar

                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- go back to main administrator page to define/create-->
        <button type="button" onclick="window.location.href='/'"
                class="btn btn-outline-secondary btn-lg ">Voltar
        </button>
    </div>
@endsection
