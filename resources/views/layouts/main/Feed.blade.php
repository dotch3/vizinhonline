@extends('layouts.main.app')
@section('title', 'Feed')

<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>

@section('content')
    <body>
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
                                        @if(!empty(auth()))
                                            <a href="#">
                                                <img onclick="redirectToProfile(this.src)"
                                                     src="{{!empty($user->image->slug) ? asset('/storage/avatar/'.$user->image->slug): '' }} "
                                                     alt="perfil" title="perfil usuario logado"/>
                                            </a>
                                        @else
                                            <div class=" fundo_img">
                                                <h2>Usuario não logado</h2>
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
                    </form>
                </section>
                <!-- Seccao dos Feeds -->
                <section class="div_feed_items col-md-10">
                    <!-- Texto inicial antes dos feeds -->
                    <h2> O que meus vizinhos estão compartilhando?</h2>
                    <p>Aqui você encontra os itens publicados recentemente</p>
                    <!-- Publicacoes feitas sao listadas a partir daqui -->
                    <article>
                        <div class="card text-center">
                            <div class="card-body col-md-12">
                                <!-- Foto e dados do usuario -->
                                <div class="info_usuario container row">
                                    <div class="col-md-3 perfil">
                                        <a href="#">
                                            <img onclick="redirectToProfile(this.src)"
                                                 src={{asset('/storage/avatar/Marcelo.png')}}
                                                     alt="perfil" title="perfil usuario da
                                        publicacao"/>
                                        </a>
                                    </div>
                                    <div class="opcoes_usuario">
                                        <h3>Marcelo</h3>
                                        <p>Apto 12 - Bloco A</p>
                                        <div class="opcoes_usuario_avaliacao">
                                            <ul>
                                                <li><a href="#">
                                                        <img
                                                            src={{asset('/img/icons/star_amarela.png')}} alt="avaliacao"
                                                            title="avaliacao"/>
                                                    </a>
                                                    <p>4.5</p>
                                                </li>
                                                <li><a href="#">
                                                        <img src={{asset('/img/icons/hands.png')}} alt="publicacoes"
                                                             title="publicacoes"/>
                                                    </a>
                                                    <p>25</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="detalhe_item shadow-sm">
                                    <!-- Detalhe do item publicado -->
                                    <a href="#">
                                        <img src={{asset('/img/itens/ferramenta1.png')}}  alt="item_publicado"
                                             title="imagem item publicado"/>
                                    </a>
                                    <h5>Ferramentas?? Eu tenho!</h5>
                                </div>
                                <div class="row container mt-3">
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/favorite3.png')}} alt="favorito"
                                                     title="favorito"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/messagem.png')}} alt="message"
                                                     title="message"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/compartilhar.png')}} alt="compartilhar"
                                                     title="compartilhar"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- Article com resposta, sem imagem so texto na publicacao -->
                    <article>
                        <div class="card text-center">
                            <div class="card-body col-md-12">
                                <!-- Foto e dados do usuario -->
                                <div class="info_usuario container row">
                                    <div class="col-md-3 perfil">
                                        <a href="#">
                                            <img src={{asset('/storage/avatar/Fernando.png')}}  alt="perfil_usuario"
                                                 title="perfil usuario da publicacao"/>
                                        </a>
                                    </div>
                                    <div class="opcoes_usuario">
                                        <h3>Fernando</h3>
                                        <p>Apto 205 - Bloco A</p>
                                        <div class="opcoes_usuario_avaliacao">
                                            <ul>
                                                <li><a href="#">
                                                        <img
                                                            src={{asset('/img/icons/star_amarela.png')}}  alt="avaliacao"
                                                            title="avaliacao"/>
                                                    </a>
                                                    <p>4.8</p>
                                                </li>
                                                <li><a href="#">
                                                        <img src={{asset('/img/icons/hands.png')}} alt="publicacoes"
                                                             title="publicacoes"/>
                                                    </a>
                                                    <p>30</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="detalhe_item shadow-sm ">
                                    <!-- Detalhe do item publicado -->
                                    <!-- Publicacao sem imagem -->
                                    <!-- <a href="#">
                                        <img src="img/ferramenta1.png" alt="imagem item publicado"
                                            title="imagem item publicado" />
                                    </a> -->
                                    <h5>Alguém teria 4 ovos para me emprestar?</h5>
                                </div>
                                <div class="row container mt-3">
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/favorite3.png')}} alt="favorito"
                                                     title="favorito"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">

                                                <img src={{asset('/img/icons/messagem.png')}} alt="message"
                                                     title="message"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/compartilhar.png')}} alt="compartilhar"
                                                     title="compartilhar"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Resposta a uma publicacao -->
                                <div class="row container mt-3">
                                    <div class="col-md-2">
                                        <div class="info_usuario_resposta">
                                            <a href="#">
                                                <img src={{asset('/storage/avatar/Lucia.png')}} alt="perfil_usuario"
                                                     title="perfil usuario resposta"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 info_usuario_resposta">
                                        <h3>Lucia</h3>
                                        <p>Apto 62 - Bloco B</p>
                                    </div>
                                </div>

                                <div class="input-group resposta col-md-12 d-flex justify-content-end">
                                    <textarea class="form-control" placeholder="Eu Tenho!" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- outro article -->
                    <article>
                        <div class="card text-center">
                            <div class="card-body col-md-12">
                                <!-- Foto e dados do usuario -->
                                <div class="info_usuario container row">
                                    <div class="col-md-3 perfil">
                                        <a href="#">
                                            <img src={{asset('/img/avatar/Lucia.png')}} alt="perfil_usuario"
                                                 title="perfil usuario da publicacao"/>
                                        </a>
                                    </div>
                                    <div class="opcoes_usuario">
                                        <h3>Lucia</h3>
                                        <p>Apto 62 - Bloco B</p>
                                        <div class="opcoes_usuario_avaliacao">
                                            <ul>
                                                <li><a href="#">
                                                        <img
                                                            src={{asset('/img/icons/star_amarela.png')}} alt="avaliacao"
                                                            title="avaliacao"/>
                                                    </a>
                                                    <p>4.7</p>
                                                </li>
                                                <li><a href="#">
                                                        <img src={{asset('/img/icons/hands.png')}} alt="publicacoes"
                                                             title="publicacoes"/>
                                                    </a>
                                                    <p>26</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="detalhe_item shadow-sm">
                                    <!-- Detalhe do item publicado -->
                                    <a href="#">
                                        <img src={{asset('/img/itens/ferramenta2.png')}} alt="item_publicado" title="imagem
                                    item publicado"/>
                                    </a>
                                    <h5>Empresto essa bolsa linda, ótima para viajar!</h5>
                                </div>
                                <div class="row container mt-3">
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/favorite3.png')}} alt="favorito"
                                                     title="favorito"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/messagem.png')}} alt="message"
                                                     title="message"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="acoes_detalhe_item">
                                            <a href="#">
                                                <img src={{asset('/img/icons/compartilhar.png')}} alt="compartilhar"
                                                     title="compartilhar"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                </section>
            </div>
        </div>
    </main>
    <!-- Including the footer -->

    </body>
@endsection

