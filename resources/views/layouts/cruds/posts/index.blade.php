@extends('layouts.main.app')
@section('title', 'Lista de Posts')

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
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">Lista de Posts</span></h4>
            </div>

        </div>
    </div>
    <div class="container ">
        <div class="container-fluid" style="text-align:center;">
            <a href="{{route('posts.create')}}" class="btn btn-success btn-lg btn-block">
                Criar Post
            </a>
        </div>
        <div class=" container-fluid">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>Lista de Posts</caption>
                    <thead class="thead-light">
                    <th class="text-center">Id</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Comment</th>
                    <th class="text-center">User</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">created at</th>
                    <th class="text-center">updated at</th>
                    <th class="text-center">Ações</th>

                    </thead>
                    @forelse($posts as $post)
                        <tbody>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->comment}}</td>
                            <td>{{ !empty($post->user) ? "#".$post->user->id." ".$post->user->name:'' }}
                            </td>
                            <td>{{ !empty($post->image) ? "#".$post->image->id." ".$post->image->slug:'' }}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <div class="container-fluid ">
                                    <a class="btn btn-outline-info btn-rounded my-0"
                                       href="{{ route('posts.show',$post->id)}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="{{ route('posts.edit',$post->id)}}
                                           ">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$post->id}}"
                                          action="{{ route('posts.destroy', $post->id)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$post->id}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha posts</p>
                        </tbody>
                    @endforelse
                </table>
                <!-- Pagination -->
                {{$posts->links()}}
            </div>
        </div>
        <!-- go back to main administrator page to define/create-->
        <button type="button" onclick="window.location.href='/'"
                class="btn btn-outline-secondary btn-lg ">Voltar
        </button>
    </div>

@endsection
@section('footer')
    @parent
@endsection
