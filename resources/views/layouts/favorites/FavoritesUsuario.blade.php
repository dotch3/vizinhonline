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
                            <div class="card text-center">

                                <div class=" col-md-12 container">

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
                                            @if(!empty($favorite->post_id))
                                                <div class=" container detalhe_post form-group row">
                                                    <p>RelationShip Posts:</p>
                                                    <h5> {{ $post = $favorite->posts($favorite->post_id)->get()->first()}}</h5>
                                                </div>

                                                <div class=" container col-md-12 detalhe_post form-group row">
                                                    @if($post->image)
                                                        <div class="detalhe_post  col-md-6 container text-center">
                                                            <a href="">
                                                                <img
                                                                    src="{{asset('/storage/posts/'.$post->image->slug)}}"
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
                                                </div>

                                                <div class="acoes_nova_publicacao container row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('posts.show',$post->id)}}"
                                                           class="btn btn-light">
                                                            Ver</a>
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
                                                                " class="btn btn-light">Eliminar
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
