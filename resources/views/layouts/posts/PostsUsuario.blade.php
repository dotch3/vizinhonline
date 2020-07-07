@extends('layouts.main.app')
@section('title', 'Posts do Usuario')

<head>
    <!-- Styles -->
    <link href="./css/estilo_feed.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery and JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<body>
<!-- Main -->
@section('content')
    <main class="main">
        <div class="row ">
        @if(!empty($user->id))
            <!-- Panel esquerdo -->
                <div class="col-md-4">
                    <!-- Including panel esquerdo do usuario: UserData -->
                    <div class="menu-lateral">
                        <!-- Including panel esquerdo do usuario: UserData -->
                        @include('.layouts/users/UserData')
                    </div>
                </div>
                <!-- Panel dereito -->

                <div class="col-md-8 container">
                    <section class="div_feed_items col-md-10">
                        <h2> Meus Posts </h2>
                        {{--                    @foreach()--}}
                        @foreach($user->posts as $post)
                            <div class="card text-center">

                                <div class="card-body col-md-12">
                                    <form method="post" action=""
                                          enctype="multipart/form-data"
                                          autocomplete="off">
                                        @csrf
                                        <div class="col-md-10 container ">
                                            <div class="input-group">
                                                <label for="title">Titulo:</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                       value="{{!empty($post->title)? $post->title:''}}"
                                                       required/>
                                            </div>
                                        @if($post->image)<!--auth()->user()->image!=null-->
                                            {{--                    @elseif(Storage::disk('public')->exists('/avatar/jorgito.png'))--}}
                                            <img src="{{asset('/storage/posts/'.$post->image->slug)}}" id="imgPost"
                                                 class="profile"
                                                 style="width: 180px;height: 170px; ">
                                            @else
                                                <div class="fundo_img">

                                                    <h2>Post Image</h2>
                                                </div>
                                            @endif

                                            <div class="input-group text_nova_publicacao">
                                                <label for="comment">Comentario:</label>
                                                <textarea class="form-control col-md-10"
                                                          id="comment"
                                                          name="comment"
                                                          autocomplete="off"
                                                          value="test"
                                                >
                                 </textarea>
                                            </div>
                                        </div>
                                        <div class="acoes_nova_publicacao container row">
                                            <div class="col-md-6">
                                                <a href="#">
                                                    <img src={{asset('/img/icons/camera.png')}} alt="Escolha_uma_imagem"
                                                         title="Escolha uma imagem"/>
                                                </a>
                                                <input type="file" name="image" id="image" multiple accept='image/*'
                                                       size='50'>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-light">Editar</button>
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
                                                            $('#imgPost').attr('src', fileReader.result)
                                                        }
                                                        fileReader.readAsDataURL(image)
                                                    })
                                                })
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                        @endforeach

                    </section>
                    @else
                        <p>Nao ha informaçao do user</p>
                </div>
                <div class="row col-md-12>">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 btn-group btn-group-lg">
                        <button type="button" onclick="window.location.href='/'"
                                class="btn btn-secondary btn-lg ">Voltar
                        </button>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>

            @endif
        </div>
    </main>
    <!-- Including the footer -->
</body>
@endsection
