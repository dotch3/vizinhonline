@extends('layouts.main.app')
@section('title', 'Favoritos do Usuario')

<head>
    <link href="{{asset('css/estilo_posts.css')}}" rel="stylesheet" type="text/css"/>
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
                        <h2> Meus Favoritos </h2>
                        {{--                    @foreach()--}}
                        @foreach($user->selected_favorites as $favorite)
                            <div class="card text-center">

                                <div class=" col-md-12 container">
                                    <form method="post" action="{{ route('favorites.update',$favorite) }}"
                                          enctype="multipart/form-data"
                                          autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            @if($favorite->id)
                                                <div class="detalhe_post row  shadow-sm col-md-10">
                                                    <p> Favorite Id:</p>
                                                    <h5>{{!empty($favorite->id)? $favorite->id:'Nao tem favorite'}}</h5>
                                                    <p>User Id:</p>
                                                    <h5>{{!empty($favorite->user_id)? $favorite->user_id:'Nao User ID'}}</h5>
                                                    <p>Post Id:</p>
                                                    <h5>{{!empty( $favorite->post_id)? $favorite->post_id:'Nao tem Post'}}</h5>

                                                    {{--                                                    {{dd($favorite->posts($favorite->id))}}÷--}}
                                                </div>
                                                <div class=" container detalhe_post form-group row">
                                                    <p>RelationShip Posts:</p>
                                                    <h5>{{!empty( $favorite->post_id)? $favorite->posts($favorite->post_id)->get():'Nao tem Post'}}</h5>
                                                </div>

                                                <div class=" container detalhe_post form-group row">
                                                    <input type="text" class="form-control-file comment_post"
                                                           id="title"
                                                           name="title" autocomplete="off"
                                                           value="">
                                                </div>
                                            @endif

                                        </div>
                                        <div class="acoes_nova_publicacao container row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-light">Ver</button>
                                            </div>

                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-light">Eliminar</button>
                                            </div>

                                        </div>
                                    </form>


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
