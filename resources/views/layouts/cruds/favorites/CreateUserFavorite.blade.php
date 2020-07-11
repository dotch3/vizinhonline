@extends('layouts.main.app')
@section('title', 'Criar Recurso Favorito')
@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-success">Criar Recurso Favorito</span></h4>
            </div>

        </div>
        @if (session('alert-success'))
            <div class="container alert alert-success" role="alert">
                {{session('alert-success')}}
            </div>
        @endif
        <div class="container row card">
            <div class="col-sm-8 offset-sm-2">
                <h2 class="display-4">Criar Recurso favorito</h2>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif
                    <form method="post" action="{{ route('favoriteUser.storePost') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <!--USERS-->
                                @if($users != null)
                                    <div class="form-group">
                                        <label for="user-content">Seleccione um usuario</label>
                                        <select name="user_id" class="form-control">
                                            <option value="0">
                                                N/A
                                            </option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">
                                                    {{$user->id." - ".$user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($user!=null)
                                    <div class="form-group">
                                        <label for="title"> Usuario:</label>
                                        <input type="text" class="form-control" name="user_name" id="user_name"
                                               value="{{$user->name ." - ". $user->lastname}}"
                                               required/>
                                    </div>
                                @else
                                    <p>Nao ha usuarios</p>
                                @endif
                            </div>
                            <!--ITEMS-->
                            <div class="col-md-4">
                                @if($items != null)
                                    <div class="form-group">
                                        <label for="item-content">Seleccione um Item</label>

                                        <select name="item_id" class="form-control">
                                            <option value="0">
                                                N/A
                                            </option>
                                            @foreach($items as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->id." - ". $item->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                @elseif($item!=null)
                                    <div class="form-group">
                                        <label for="title"> Items:</label>
                                        <input type="text" class="form-control" name="item_name" id="item_name"
                                               value="{{$item->name ." ". $item->description}}"
                                               required/>
                                    </div>
                                @else
                                    <p>Nao ha Items</p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if($posts != null)
                                    <div class="form-group">
                                        <label for="item-content">Seleccione um Post</label>
                                        <select name="post_id" class="form-control">
                                            <option value="0">
                                                N/A
                                            </option>
                                            @foreach($posts as $post)
                                                <option value="{{$post->id}}">
                                                    {{$post->id ." ".$post->comment }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                @elseif($post!=null)
                                    <div class="form-group">
                                        <label for="title"> Items:</label>
                                        <input type="text" class="form-control" name="post_name" id="post_name"
                                               value="{{$post->id ." ". $post->comment}}"
                                               required/>
                                    </div>
                                @else
                                    <p>Nao ha Posts</p>
                                @endif
                            </div>

                            <!-- POSTS-->
                        </div>

                        <hr>
                        <div class="col-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/favorites'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>
                            <button type="submit" class="btn btn-outline-success btn-lg">Criar Favorito</button>

                        </div>
                        <div class="col-3">
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
