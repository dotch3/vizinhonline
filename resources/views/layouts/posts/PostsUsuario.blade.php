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
        <div class="row">
                 <div class="menu-lateral">
                    <!-- Including panel esquerdo do usuario: UserData -->
                 
                                                    </label>

                                                </div>
                                            </div>
                                            @else
                                            <div class="post-image">	
                                                <div class="img_upload">
                                                    <label class="label">
                                                        <input type="file" name="image" id="image" multiple accept='image/*' size='50'>

                                                            <figure class="post-figure">
                                                                <img id="imgPost" src={{asset('/storage/avatar/fundo.png')}} alt="Escolha_uma_imagem" title="Escolha uma imagem"/>
                                                                    <figcaption class="post-figcaption">
                                                                        <img src={{asset('/img/icons/camera.png')}} alt="Escolha_uma_imagem" title="Escolha uma imagem"/>	
                                                                    </figcaption>
                                                            </figure>
                                                     </label>
                                                </div>
                                            </div>   
                                            @endif
                                            <div class="row detalhe_post col-md-10 input-group">
                                                <!--Post Comment-->
                                                <input type="text" class="form-control-file comment_post" id="comment" name="comment" autocomplete="off" value="{{!empty($post->comment)? $post->comment:''}}">
                                            </div>
                                            <div class="col-md-6">
                                                <button id="btn-salvar"type="submit" class="btn btn-outline"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                                            </div>
                                    </div>    
                                </form>
                                <div class=" container col-md-11 justify-content-end detalhe_respostas">
                                    <h4>Mensagens:</h4>
                                    <div class="container shadow-sm respostas">
                                        @forelse($post->repliers()->get() as $replier)
                                            <div class="row container mt-3">
                                                <div class="col-md-2">
                                                    <div class="info_usuario_resposta">
                                                        @if(!empty($replier->id))
                                                            <a href="#">
                                                                <img onclick="redirectToProfile(this.src)" src="{{!empty($replier->image->slug) ? asset('/storage/avatar/'.$replier->image->slug): '' }} "
                                                                 alt="replier" title="replier" width="80 px"/>
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
                                            <div class="input-group resposta col-md-12 d-flex justify-content-md-center">
                                                <input class="form-control" id="reply" name="reply" value="{{!empty($replier->id)?  $replier->pivot->reply:''}}" disabled>
                                            </div>
                                        @empty
                                            <textarea class="form-control" placeholder="Nenhuma mensagem ainda! :(" readonly></textarea>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="container detalhe_post">
                                    <form action="{{route('PostResponse.create',$post)}}" method="post" autocomplete="off">
                                        @csrf
                                        <textarea class="form-control" id="reply" name="reply" placeholder="Nova mensagem.." required></textarea>
                                        <button id="btn-comentar" type="submit" class="btn btn-outline"><i class="fa fa-comment" aria-hidden="true"></i> Comentar</button>
                                    </form>
                                </div>
                                <div class="container">
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$post->id}}" action="{{ route('posts', $post->id)}}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button id="btn-trash"
                                        onclick="if (confirm('Eliminação e irreversível. Tem certeza que quer eliminar o POST?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$post->id}}').submit();
                                            }
                                            else{
                                            event.preventDefault();
                                            }
                                            " class="btn btn-outline"><i class="fa fa-trash" aria-hidden="true"></i>
                                    Excluir</button>
                                </div>
                            </div>
                        </div>   
                    @empty
                            <p>Não tem posts</p>
                            <div class="row col-md-12>">
                                <div class="col-md-3">
                                    <div class="col-md-6 btn-group btn-group-lg">
                                        <button type="button" onclick="window.location.href='/'" class="btn btn-secondary btn-lg ">Voltar</button>
                                    </div>
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
                    <div class="col-md-6 btn-group btn-group-lg">
                        <button type="button" onclick="window.location.href='/'" class="btn btn-secondary btn-lg ">Voltar</button>
                    </div>
                </div>
            </div>
            <br>
        @endif
    </main>
    <!-- Including the footer -->
    <script 
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

<script>
      $(function () {
        $('#image').change(function () {
             $('#imgPost').show();
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
</body>
@endsection
