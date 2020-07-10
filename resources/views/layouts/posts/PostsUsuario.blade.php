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

                                <div class=" col-md-12 container">
                                    <form method="post" action="{{ route('posts.update',$post) }}"
                                          enctype="multipart/form-data"
                                          autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            @if($post->title)
                                                <div class="detalhe_post row  shadow-sm">
                                                    <h3> teste: Post ID</h3>
                                                    <h3>{{!empty($post->id)? $post->id:'Nao tem post ID'}}</h3>
                                                    <h3>User ID:</h3>
                                                    <h3>{{!empty($post->user->id)? $post->user->id:'Nao User ID'}}</h3>
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
                                                <input type="text" class="form-control-file comment_post" id="reply"
                                                       name="reply" autocomplete="off"
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
                                                <button type="submit" class="btn btn-light">Editar</button>
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
                                </div>

                            </div>

                            <br>
                        @endforeach

                    </section>

                    @else
                </div>

                <div class="container col-md-12">
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
