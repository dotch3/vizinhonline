@extends('layouts.main.app')
@section('title', 'Feed')

<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>

@section('content')

    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <!-- Main -->
    <body>
    <main class="main">

        <div class="row ">
            <!-- Panel esquerdo -->

            <div class="col-md-4">
                <div class="menu-lateral">
                    <!-- Including panel esquerdo do usuario: UserData -->
                    {{--                @include('../layouts/users/UserData')--}}
                    @include('.layouts/users/UserData')
                </div>
            </div>

            <!-- Panel dereito -->
            <div class="col-md-8">

                <!-- Seccao de nova publicacao -->
                <section class="div_nova_publicacao col-md-10">

                    <form method="post" action="{{ route('posts.store') }}"
                          enctype="multipart/form-data"
                          autocomplete="off">
                        @csrf
                        <div class="card text-center">
                            <div class="card-body col-md-12">
                                <!-- Foto e dados do usuario logado -->
                                <div class="info_usuario_publicacao container row">
                                    <div class="col-md-3 perfil">
                                        @if(!empty(Auth::check()))
                                            {{--                                            <p>{{Auth::user()}}</p>--}}
                                            <a href="#">
                                                <img onclick="redirectToProfile(this.src)"
                                                     src="{{!empty(Auth::user()->image->slug) ? asset('/storage/avatar/'.Auth::user()->image->slug): '' }} "
                                                     alt="perfil" title="perfil usuario logado"/>
                                            </a>
                                        @else
                                            <div class=" fundo_img">
                                                <h2>Usuario não logado</h2>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="opcoes_usuario">
                                        <h3>{{ !empty(Auth::user()->id) ? Auth::user()->name." ".Auth::user()->lastname: '' }}</h3>
                                        <p>{{ !empty(Auth::user()->location) ? Auth::user()->location->building." - " .Auth::user()->location->apartment_number: '' }}</p>
                                        {{--                                        <p>{{!empty(auth())? 'Auth ok:' :'No Auth'}}</p>--}}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!-- Detalhe do item publicado -->
                                    <img src="" class="profile"
                                         id="imagePost"
                                         name="imagePost"
                                    >
                                </div>
                                <div class="input-group text_nova_publicacao">
                                <textarea class="form-control"
                                          placeholder="O que você vai compartilhar hoje?"
                                          id="comment"
                                          name="comment"
                                          autocomplete="off"></textarea>
                                </div>

                                <div class="acoes_nova_publicacao container row">
                                    <div class="col-md-6">
                                        <a href="#">
                                            <img src="{{asset('/img/icons/camera.png')}}" alt="Escolha_uma_imagem"
                                                 title="Escolha uma imagem"/>
                                        </a>
                                        <input type="file" name="image" id="image" multiple accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-light">Publicar</button>
                                    </div>
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
                            </div>
                        </div>
                    </form>
                </section>
                <section class="div_feed_items col-md-10">
                    <!-- Texto inicial antes dos feeds -->
                    <h2> O que meus vizinhos estão compartilhando?</h2>
                    <p>Aqui você encontra os itens publicados recentemente</p>
                    <!-- Publicacoes feitas sao listadas a partir daqui -->
                    @forelse($posts as $post)
                        <article class="post">
                            <div class="card text-center">
                                <div class="card-body col-md-12">
                                    <form action="{{route('favoriteUser.savePostFavorite',$post->user->id)}}"
                                          method="post"
                                          id="favoriteForm">
                                        @csrf
                                        <div class="info_usuario container row">
                                            <div class="col-md-3 perfil">
                                                @if(!empty($post->user->image->id))
                                                    <a href="#">
                                                        <img onclick="redirectToProfile(this.src)"
                                                             src={{asset('/storage/avatar/'.$post->user->image->slug)}}
                                                                 alt="perfil" title="perfil usuario da
                                        publicacao"/>
                                                    </a>
                                                @else
                                                    <div class="fundo_img">
                                                        <a href="#">
                                                            <img onclick="return redirectToProfile(this.src)"
                                                            /> Sem imagem
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class=" detalhe_post_feed">
                                                <h4>{{$post->user->name." ".$post->user->lastname}}</h4>
                                                <h3>{{(!empty($post->user->location) ?" Apto ".$post->user->location->apartment_number.", ".$post->user->location->building : 'Apto: N/A, Bloco: N/A')}}</h3>

                                            </div>
                                        </div>
                                        <div class="detalhe_item shadow-sm">
                                            <!-- Detalhe do item publicado -->
                                            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="user_id" id="user_id"
                                                   value="{{$post->user->id}}"> <!--TODO: Work with Auth()-->
                                            @if(!empty($post->image->id))
                                                <a href="#">
                                                    <img
                                                        src={{asset('/storage/posts/'.$post->image->slug)}}  alt="{{$post->title}}"
                                                        title="{{$post->title}}"/>
                                                </a>
                                            @else
                                                <a href="#">
                                                    <img
                                                        src={{asset('/img/itens/ferramenta1.png')}}  alt="item_publicado"
                                                        title="imagem item publicado"/>
                                                </a>
                                            @endif
                                            <h5>{{$post->comment}}</h5>
                                        </div>
                                        <div class="row container mt-3">
                                            <div class="col-md-6">
                                                <div class="acoes_detalhe_item interaction">
                                                    <button type="submit"
                                                            class="like btn btn-link"
                                                    >
                                                        @if((!empty($post->isFavorite($post->id,$post->user->id)->created_at)))
                                                            <img
                                                                src={{asset('/img/icons/favoriteSelected.png')}} alt="favorito"
                                                                title="favorito"
                                                                name="favoritePost"
                                                                id="favoritePost"
                                                            >
                                                        @else
                                                            <img
                                                                src={{asset('/img/icons/favorite3.png')}} alt="favorito"
                                                                title="favorito"
                                                                name="favoritePost"
                                                                id="favoritePost"
                                                            >
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="acoes_detalhe_item">
                                                    <a href="{{route('posts.show', $post->id)}}">
                                                        <img src={{asset('/img/icons/messagem.png')}} alt="message"
                                                             title="message"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--FORM-->
                                </div>

                                <!-- Section for the responses-->
                                <div
                                    class=" container col-md-11 justify-content-end detalhe_respostas">

                                    {{--                                    <h4>Ultima resposta:</h4>--}}
                                    <div class="container shadow-sm respostas">

                                        {{--                                        {{$response=$post->repliers()->where('post_id',$post->id)->orderBy('id','desc')->first()}}--}}

                                        @forelse($post->repliers()->get() as $replier)
                                            @if($replier->pivot->created_at == $post->lastResponse($replier)->created_at)
                                                <div class="container">
                                                    <p>última resposta <span class="badge badge-light">({{$replier->created_at}})</span>
                                                    </p>
                                                </div>

                                                <div class="row container mt-3">
                                                    <div class="col-md-2">
                                                        <div class="info_usuario_resposta">
                                                            @if(!empty($replier->image))
                                                                <a href="#">
                                                                    <img onclick="redirectToProfile(this.src)"
                                                                         src="{{!empty($replier->image->slug) ? asset('/storage/avatar/'.$replier->image->slug): '' }} "
                                                                         alt="replier" title="replier"
                                                                         width="80 px"/>
                                                                </a>
                                                            @else
                                                                <div class="fundo_img">
                                                                    <h5>Sem imagem</h5>
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

                                            @endif

                                        @empty
                                            <p>Nao tem respostas ainda!</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p>Não ha posts</p>
                    @endforelse

                </section>
            </div>
        </div>
    </main>
    <!-- Including the footer -->

    </body>
@endsection

