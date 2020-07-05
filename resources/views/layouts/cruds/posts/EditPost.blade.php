@extends('layouts.main.app')
@section('title', 'Editar post')


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
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-warning">Editar Post</span></h4>
            </div>

        </div>
        @if(!empty($post->id))
            <div class="container row card">
                <div class="col-sm-12 ">
                    <h2 class="display-4">Editar Post</h2>
                    <div class=" col-md-12">


                        <form method="post" action="{{ route('posts.update',$post->id) }}"
                              enctype="multipart/form-data"
                              autocomplete="off">
                            @method('POST')
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                @if($post->image)<!--auth()->user()->image!=null-->
                                    {{--                    @elseif(Storage::disk('public')->exists('/avatar/jorgito.png'))--}}
                                    <img src="{{asset('/storage/post/'.$post->image->slug)}}" id="imgPost"
                                         class="profile"
                                         style="width: 180px;height: 170px; ">
                                    @else
                                        <div class="fundo_img">

                                            <h2>Post Image</h2>
                                        </div>
                                    @endif


                                    <div class="profile-img img_upload">
                                        <input type="file" name="image" id="image" multiple accept='image/*' size='50'>
                                    </div>
                                    <script
                                        src="https://code.jquery.com/jquery-3.5.1.min.js"
                                        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                                        crossorigin="anonymous"></script>
                                    <script>
                                        $(function () {
                                            $('#image').change(function () {
                                                const image = $(this)[0].files[0];
                                                console.log(image);
                                                const fileReader = new FileReader();
                                                fileReader.onloadend = function () {
                                                    $('#imgPost').attr('display');
                                                    $('#imgPost').attr('src', fileReader.result)
                                                }
                                                fileReader.readAsDataURL(image)
                                            })
                                        })
                                    </script>
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
                                               value="{{ !empty($post->users) ? $post->users->first() : '' }}"
                                        />
                                    </div>
                                </div>
                            </div>

                            @else
                                <p>Nao ha informaçao do post</p>
                            @endif

                            <div class="row col-md-12>">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6 btn-group btn-group-lg">
                                    <button type="button" onclick="window.location.href='/posts'"
                                            class="btn btn-outline-secondary btn-lg ">Voltar
                                    </button>
                                    @if(!empty($post->id))
                                        <button type="submit" class="btn btn-warning btn-lg">Editar Post</button>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
