@extends('layouts.main.app')
@section('title', 'Posts do Usuario')

<head>
    <link href="{{asset('css/estilo_posts.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body>
<!-- Main -->
@section('content')
    @if (session('alert-success'))
        <div class=" alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    @if (session('alert-error'))
        <div class="alert alert-danger" role="alert">
            {{session('alert-error')}}
            {{$errors}}
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <main class="main">
        @if(!empty($user->id))
        <div class="row ">
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
                        @forelse($user->posts as $post)
                            <div class="card text-center">

                                <div class=" col-md-12 container">
                                    <form method="post" action="{{ route('posts.update',$post) }}"
                                          enctype="multipart/form-data"
                                          autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            @if($post->title)
                                                <div class="detalhe_post row  shadow-sm col-md-10">
                                                    <p> Post ID</p>
                                                    <h5>{{!empty($post->id)? $post->id:'Nao tem post ID'}}</h5>
                                                </div>
                                                <div class=" container detalhe_post form-group row">
                                                    <input type="text" class="form-control-file comment_post"
                                                           id="title"
                                                           name="title" autocomplete="off"
                                                           value="{{!empty($post->title)? $post->title:''}}">
                                                </div>
                                            @endif
                                            @if($post->image)
                                                <div class="detalhe_post col-md-12">
                                                    <a href="">
                                                        <img src="{{asset('/storage/posts/'.$post->image->slug)}}"
                                                             id="imagePost"
                                                             class="profile"
                                                             style="width: 80%;">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="fundo_img">
                                                    <h2>Post Image</h2>
                                                </div>
                                            @endif

                                            <div class="row detalhe_post col-md-10 input-group">
                                                <!--Post Comment-->
                                                <input type="text" class="form-control-file comment_post"
                                                       id="comment"
                                                       name="comment" autocomplete="off"
                                                       value="{{!empty($post->comment)? $post->comment:''}}">
                                            </div>
                                        </div>
                                        <div class="acoes_nova_publicacao container row">
                                            <div class="col-md-6">
                                                <a href="#">
                                                    <img
                                                        src={{asset('/img/icons/camera.png')}} alt="Escolha_uma_imagem"
                                                        title="Escolha uma imagem"/>
                                                </a>
                                                <input type="file" name="image" id="image" multiple accept='image/*'
                                                       size='50'>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-outline-secondary">Editar
                                                </button>

                                            </div>
                                        </div>
                                    </form>

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

                                <div
                                    class=" container col-md-11 justify-content-end detalhe_respostas">
                                    <h4>Respostas:</h4>
                                    <div class="container shadow-sm respostas">
                                        @forelse($post->repliers()->get() as $replier)
                                            <div class="row container mt-3">
                                                <div class="col-md-2">
                                                    <div class="info_usuario_resposta">
                                                        @if(!empty($replier->id))
                                                            <a href="#">
                                                                <img onclick="redirectToProfile(this.src)"
                                                                     src="{{!empty($replier->image->slug) ? asset('/storage/avatar/'.$replier->image->slug): '' }} "
                                                                     alt="replier" title="replier"
                                                                     width="80 px"/>
                                                            </a>
                                                        @else
                                                            <div class=" fundo_img">
                                                                <h2>replier foto</h2>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-5 reply">
                                                    <h5>{{ !empty($replier->id) ? $replier->name." ".$replier->lastname: '' }}</h5>
                                                    <p>{{ !empty($replier->location) ? $replier->location->building." - " .$replier->location->apartment_number: '' }}</p>
                                                    <p>{{!empty(auth())? 'Auth ok:' :'No Auth'}}</p>
                                                </div>
                                            </div>

                                            <div
                                                class="input-group resposta col-md-12 d-flex justify-content-md-center">
                                                <input class="form-control"
                                                       id="reply" name="reply"
                                                       value="{{!empty($replier->id)?  $replier->pivot->reply:''}}"
                                                       disabled
                                                >
                                            </div>
                                        @empty

                                            <textarea class="form-control" placeholder="Nao tem respostas ainda!"
                                                      readonly></textarea>

                                        @endforelse
                                    </div>
                                </div>
                                <div class="container detalhe_post">
                                    <form action="{{route('PostResponse.create',$post)}}" method="post"
                                          autocomplete="off">
                                        @csrf
                                        <textarea class="form-control" id="reply" name="reply"
                                                  placeholder="Nova resposta.." required
                                        ></textarea>

                                        <button type="submit" class="btn btn-outline-secondary">Comentar
                                        </button>

                                    </form>
                                </div>
                                <div class="container">
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$post->id}}"
                                          action="{{ route('posts', $post->id)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button
                                        onclick="if (confirm('Eliminação e irreversível. Tem certeza que quer eliminar o POST?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$post->id}}').submit();
                                            }
                                            else{
                                            event.preventDefault();
                                            }
                                            " class="btn btn-lg btn-block btn-outline-secondary">Eliminar
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p>Não tem posts</p>
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
                            <br>
                        @endforelse
                    </section>
                </div>
        </div>
        @else
            <div class="container col-md-12">
                <p>Não ha informação do user</p>
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
    </main>
    <!-- Including the footer -->
</body>
@endsection
