@extends('layouts.main.app')
@section('title', 'List Users')

@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">List users</span></h4>
            </div>
        </div>
    </div>
    <div class="container col-md-12">
        <div class="container col-md-10">
            <div class="container" style="text-align:center;">
                <a href="{{route('users.create')}}" class="btn btn-success btn-lg btn-block">
                    Add User
                </a>
                <a href="{{url('/CadastroUsuario')}}" class="btn btn-info btn-lg btn-block">
                    Cadastrar User
                </a>
            </div>
        </div>
        <div class=" container col-md-10">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>List of Users</caption>
                    <thead class="black white-text">
                    <th class="text-center">Id</th>
                    <th class="text-center">RG</th>
                    <th class="text-center">name</th>
                    {{--                    <th class="text-center">Lastname</th>--}}
                    {{--                    <th class="text-center">username</th>--}}
                    {{--                    <th class="text-center">password</th>--}}
                    {{--                    <th class="text-center">E-mail</th>--}}
                    {{--                    <th class="text-center">Cellphone</th>--}}
                    {{--                    <th class="text-center">CPF</th>--}}
                    {{--                    <th class="text-center">Age</th>--}}
                    {{--                    <th class="text-center">Ranking</th>--}}
                    {{--                    <th class="text-center">Image Id</th>--}}
                    <th class="text-center">Created at</th>
                    <th class="text-center">Updated at</th>
                    <th class="text-center" scope="col">USER_FAVORITE-></th>
                    <th class="text-center" scope="col">Ação</th>
                    </thead>
                    @forelse($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->id_user}}</td>
                            <td>{{$user->rg}}</td>
                            <td>{{$user->name}}</td>
                            {{--                            <td>{{$user->last_name}}</td>--}}
                            {{--                            <td>{{$user->username}}</td>--}}
                            {{--                            <td>{{$user->password}}</td>--}}
                            {{--                            <td>{{$user->email}}</td>--}}
                            {{--                            <td>{{$user->cellphone}}</td>--}}
                            {{--                            <td>{{$user->cpf}}</td>--}}
                            {{--                            <td>{{$user->age}}</td>--}}
                            {{--                            <td>{{$user->ranking}}</td>--}}
                            {{--                            <td>{{$user->image_id}}</td>--}}
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->favorites()->id_user_favorite}}
                            </td>
                            <td>
                                <div class=" container-fluid">
                                    <a class="btn btn-outline-info btn-rounded my-0"
                                       href="{{route ('users.view',$user->id_user)}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="{{route ('users.edit',$user->id_user)}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$user->id_user}}"
                                          action="{{ route('users.destroy', $user->id_user)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$user->id_user}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded btn-sm my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha users</p>
                        </tbody>
                    @endforelse
                </table>
                <!-- Pagination -->
                {{$users->links()}}
            </div>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
