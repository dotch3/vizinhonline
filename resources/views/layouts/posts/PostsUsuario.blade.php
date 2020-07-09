@extends('layouts.main.app')
@section('title', 'Posts do Usuario')

<head>
    <link href="{{asset('css/estilo_feed.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body>
<!-- Main -->
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
                                    <form method="post" action="{{ route('posts.update',$post->id) }}"
                                          enctype="multipart/form-data"
                                          autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            @if($post->title)
                                                <div class="detalhe_item row">
                                                    <h3>Teste</h3>
                                                    <h3>User ID:</h3>
                                                    <h3>{{!empty($post->user->id)? $post->user->id:'Nao User ID'}}</h3>
                                                </div>
                                                <div class=" col-md-10 detalhe_item form-group row">

                                                    <h4>Titulo:</h4>
                                                    <input type="text" class="form-control-file comment_post"
                                                           id="title"
                                                           name="title" autocomplete="off"
                                                           value="{{!empty($post->title)? $post->title:''}}">
                                                </div>
                                            @endif
                                            @if($post->image)
                                                <img src="{{asset('/storage/posts/'.$post->image->slug)}}"
                                                     id="imagePost"
                                                     class="profile"
                                                     style="width: 400px;height: 250px; ">
                                            @else
                                                <div class="fundo_img">
                                                    <h2>Post Image</h2>
                                                </div>
                                            @endif

                                            <div class="row detalhe_item col-md-10 input-group">
                                                <h4>Comentario:</h4>
                                                <input type="text" class="form-control-file comment_post" id="comment"
                                                       name="comment" autocomplete="off"
                                                       value="{{!empty($post->comment)? $post->comment:''}}">
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
                                                <button type="submit" class="btn btn-outline-warning">Editar</button>
                                            </div>
                                            <script>
                                                $(function () {
                                                    $('#image').change(function () {
                                                        console.log('test');
                                                        const image = $(this)[0].files[0];
                                                        console.log(image);
                                                        const fileReader = new FileReader();
                                                        fileReader.onloadend = function () {
                                                            $('#imagePost').attr('src', fileReader.result)
                                                        }
                                                        fileReader.readAsDataURL(image)
                                                    })
                                                })
                                            </script>
                                        </div>
                                    </form>
                                    <div
                                        class="detalhe_item col-md-10 form-group justify-content-end">
                                        <h4>Respostas:</h4>
                                        <div class="card">
                                            <form action="{{route('commentPost.create',$post->id,3)}}" method="post"
                                                  autocomplete="off">
                                                @csrf
                                                <textarea class="form-control" id="new_comment" name="new_comment"
                                                          placeholder="Interessad@!" required
                                                ></textarea>
                                                <div class="col-md-12" style="text-align: right">
                                                    <button type="submit" class="btn btn-secondary">Comentar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <p>For each de respostas aqui:</p>
                                        <div class="card">
                                            <textarea class="form-control" placeholder="resposta!"
                                                      id="post_answer" name="post_answer" readonly></textarea>
                                        </div>

                                        <div class="card">
                                            <textarea class="form-control" placeholder="resposta2"
                                                      readonly></textarea>
                                        </div>
                                    </div>
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
