@extends('layouts.main.app')
@section('title', 'Favoritos do Usuario')

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
                        <h2> Meus Favoritos </h2>
                        {{--                    @foreach()--}}
                        @forelse($user->selected_favorites as $favorite)
                            <div class="col-8 card text-center">

                                

                                    <div>
                                        @if($favorite->id)
                                            <div class="detalhe_post row  shadow-sm">
                                                <p> Favorite Id:</p>
                                                <h5>{{!empty($favorite->id)? $favorite->id:'Nao tem favorite'}}</h5>
                                                <p>User Id:</p>
                                                <h5>{{!empty($favorite->user_id)? $favorite->user_id:'Nao User ID'}}</h5>
                                                <p>Post Id:</p>
                                                <h5>{{!empty( $favorite->post_id)? $favorite->post_id:'Nao tem Post'}}</h5>
                                
                                                {{--                                                    {{dd($favorite->posts($favorite->id))}}÷--}}
                                            </div>
                                            @if(!empty($favorite->post_id))
                                               

                                                <div>
                                                    @if( $favorite->posts($favorite->post_id)->get()->first()->image)
                                                        <div class="imagem-favoritos">
                                                            <a href="">
                                                                <img
                                                                    src="{{asset('/storage/posts/'. $favorite->posts($favorite->post_id)->get()->first()->image->slug)}}"
                                                                    id="imagePost"
                                                                    class="profile"
                                                                    style="width: 80%;">
                                                            </a>
                                                        </div>
                                                    @else
                                                    <br>
                                                        <div class="imagem-favoritos">

                                                        <img src="{{asset('storage/posts/fundo.png')}}">
                                                        </div>
                                                       
                                                    @endif
                                                    
                                                </div>

                                                <div class="acoes_nova_publicacao container row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('posts.show', $favorite->posts($favorite->post_id)->get()->first()->id)}}"
                                                           class="btn btn-light">
                                                            <i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <form method="post" id="delete-favorite-{{$favorite->id}}"
                                                              action="{{ route('favorites',$favorite->id)}}"
                                                              style="display:none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button
                                                            onclick="if (confirm('Eliminação e irreversível. Tem certeza que quer eliminar o FAVORITO?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-favorite-{{$favorite->id}}').submit();
                                                                }
                                                                else{
                                                                event.preventDefault();
                                                                }
                                                                " class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            @elseif(!empty($favorite->item_id))
                                                <div class=" container detalhe_post form-group row">
                                                    <p>RelationShip Items:</p>
                                                    <h5>{{$favorite->items($favorite->item_id)->get()}}</h5>
                                                </div>
                                                <div class=" container detalhe_post form-group row">
                                                    <p>Item stuff aqui!!</p>
                                                </div>
                                            @endif

                                        @endif
                                    </div>
                                

                            </div>
                        @empty
                            <p>Não tem favoritos</p>
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
                @else
                    <div class="container col-md-12">
                        <p>Não ha informação do user</p>
                    </div>
                    <div class="row col-md-12>">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/'"
                                    class="btn btn-secondary btn-lg ">Home
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
