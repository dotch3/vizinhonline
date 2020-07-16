@extends('layouts.main.app')
@section('title', 'Detalhe post')
<head>
    <link href="{{asset('css/estilo_posts.css')}}" rel="stylesheet" type="text/css"/>
</head>

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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
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
                                           disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comentario:</label>
                                    <input type="text" class="form-control" name="comment" id="comment"
                                           value="{{ !empty($post->comment) ? $post->comment : '' }}"
                                           disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Usuario Criador:</label>
                                    <input type="text" class="form-control" name="user_id" id="user_id"
                                           value="{{ !empty($post->user) ?$post->user->id." ".$post->user->name: '' }}"
                                           disabled
                                    />
                                </div>
                            </div>
                        </div>
                        <!--Answers-->
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

                        <!--section for new answers-->
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
                                   class="btn btn-secondary btn-lg ">Ver vizinho
                                </a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
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
