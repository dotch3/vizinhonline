@extends('layouts.main.app')
@section('title', 'Detalhe post')


@section('content')
    <div class="container">
        @if(!empty($post->id))
            <div class=" jumbotron version_banner">
                <div class="row">
                    <h4><span
                            class="badge badge-pill badge-warning">Detalhe Post</span></h4>
                </div>

            </div>
            <div class="container row card">
                <div class="col-sm-12 ">
                    <h2 class="display-4">Detalhe post</h2>
                    <div class=" col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br/>
                        @endif
                        <form method="post" action="{{ route('posts.store') }}"
                              enctype="multipart/form-data"
                              autocomplete="off">
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-md-4">
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
                                </div>
                                <div class="container col-md-8">
                                    <div class="form-group">
                                        <label for="title"> Titulo:</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                               value="{{ !empty($post->title) ? $post->title : '' }}"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comentario:</label>
                                        <input type="text" class="form-control" name="comment" id="comment"
                                               value="{{ !empty($post->comment) ? $post->comment : '' }}"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Usuario Criador:</label>
                                        <input type="text" class="form-control" name="user_id" id="user_id"
                                               value="{{ !empty($post->user) ?$post->user->id." ".$post->user->name: '' }}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12 text-center">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4 btn-group btn-group-lg">
                                    <button type="button" class="btn btn-secondary"
                                            onclick="window.history.go(-1); return false;">Voltar
                                    </button>
                                </div>
                                <div class="col-md-4 btn-group btn-group-lg">
                                    <a href="{{route('posts',$post->user->id)}}"
                                       class="btn btn-secondary btn-lg ">Ver usuario
                                    </a>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                        <div class="container col-md-12">
                            <p>Não ha informação do post</p>
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
            </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
