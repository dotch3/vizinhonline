@extends('layouts.main.app')
@section('title', 'Feed')

<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>

@section('content')
    <body>
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
    <!-- Main -->

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
                    <div class="card text-center">
                        <div class="card-body col-md-12">
                            <!-- Foto e dados do usuario logado -->
                            <div class="info_usuario_publicacao container row">
                                <div class="col-md-3 perfil">
                                    @if(empty(auth()))
                                        <a href="#">
                                            <img onclick="redirectToProfile(this.src)"
                                                 src="{{!empty($user->image->slug) ? asset('/storage/avatar/'.$user->image->slug): '' }} "
                                                 alt="perfil" title="perfil usuario logado"/>
                                        </a>
                                    @else
                                        <div class=" fundo_img">
                                            <h5>Usuario não logado</h5>
                                        </div>
                                    @endif
                                </div>
                                <div class="opcoes_usuario">
                                    <h3>{{ !empty($user->id) ? $user->name." ".$user->lastname: '' }}</h3>
                                    <p>{{ !empty($user->location) ? $user->location->building." - " .$user->location->apartment_number: '' }}</p>
                                    <p>{{!empty(auth())? 'Auth ok:' :'No Auth'}}</p>
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
                                          autocomplete="off">
                                </textarea>
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

                </section>
                <!-- Seccao dos Feeds -->
                <section class="div_feed_items col-md-10">
                    <!-- Texto inicial antes dos feeds -->
                    <h2> O que meus vizinhos estão compartilhando?</h2>
                    <p>Aqui você encontra os itens publicados recentemente</p>
                    <!-- Publicacoes feitas sao listadas a partir daqui -->

                    @forelse($posts as $post)
                        <article>
                            <div class="card text-center">
                                <div class="card-body col-md-12">
                                {{--                                {{dd($post->user->image->slug)}}--}}
                                <!-- Foto e dados do usuario -->
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
                                                        <img onclick="redirectToProfile(this.src)"
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
                                        @if(!empty($post->image->id))
                                            <a href="#">
                                                <img
                                                    src={{asset('/storage/posts/'.$post->image->slug)}}  alt="{{$post->title}}"
                                                    title="{{$post->title}}"/>
                                            </a>
                                        @else
                                            <a href="#">
                                                <img src={{asset('/img/itens/ferramenta1.png')}}  alt="item_publicado"
                                                     title="imagem item publicado"/>
                                            </a>
                                        @endif
                                        <h5>{{$post->comment}}</h5>
                                    </div>
                                    <div class="row container mt-3">
                                        <div class="col-md-6">
                                            <div class="acoes_detalhe_item">
{{--                                                <form method="post" action="{{ route('favoriteUser.storePost') }}">--}}
{{--                                                    @csrf--}}
                                                <a href="{{route('favoriteUser.storePost')}}">
                                                    <img src={{asset('/img/icons/favorite3.png')}} alt="favorito"
                                                         title="favorito"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="acoes_detalhe_item">
                                                <a href="{{route('posts.show',$post->id)}}">
                                                    <img src={{asset('/img/icons/messagem.png')}} alt="message"
                                                         title="message"/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Section for the responses-->
                                <div
                                    class=" container col-md-11 justify-content-end detalhe_respostas">

{{--                                    <h4>Ultima resposta:</h4>--}}
                                    <div class="container shadow-sm respostas">

                                        {{-- {{dd('TESTE LAST:',$response)}}--}}
{{--                                        @if($response)--}}
                                        {{--                                            {{$response=$post->repliers()->where('post_id',$post->id)->orderBy('id','desc')->first()}}--}}
{{--                                        {{"Latest Response:".$post->latestResponse($post->id)}}--}}
                                    @forelse($post->repliers()->get() as $replier)
{{--                                        <hr>--}}
{{--                                        <br>--}}
{{--                                        {{dd($replier)}}--}}
{{--                                        {{$replier->pivot}}--}}
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

