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
    <div class="container">
        <div class="row">
            <a href="{{route('users.create')}}" class="btn btn-success">
                Add User
            </a>
        </div>
        <div class="row">
        </div>

        <div class="row container">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive table-striped text-center">
                    <caption>List of Users</caption>
                    <thead class="thead-light">
                    <th class="text-center">Id</th>
                    <th class="text-center">RG</th>
                    <th class="text-center">name</th>
                    <th class="text-center">Lastname</th>
                    <th class="text-center">username</th>
                    <th class="text-center">password</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Cellphone</th>
                    <th class="text-center">CPF</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Ranking</th>
                    <th class="text-center">Image Id</th>
                    <th class="text-center">Created at</th>
                    <th class="text-center">Updated at</th>
                    <th class="text-center" scope="col">Ação</th>
                    </thead>
                    @forelse($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->id_user}}</td>
                            <td>{{$user->rg}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->cellphone}}</td>
                            <td>{{$user->cpf}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->ranking}}</td>
                            <td>{{$user->image_id}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <div class=" row container">
                                    <div class="col-md-7 btn-group">
                                        <span class="table-remove"><button type="button"
                                                                           onclick="window.location.href='{{route ('users.view',$user->id_user)}}'"
                                                                           class="btn btn-outline-info btn-rounded btn-sm my-0">Details
                                    </button></span>
                                        <span class="table-remove"><button type="button"
                                                                           onclick="window.location.href='{{ route('users.edit',$user->id_user)}}'"
                                                                           class="btn btn-outline-warning btn-rounded btn-sm my-0"> Edit
                                        </button></span>
                                    </div>
                                    <div class="row col-md-2">
                                        <form class="form-horizontal"
                                              action="{{ route('users.destroy', $user->id_user)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group col-sm-9">
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-rounded btn-sm my-0">
                                                    Delete
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha users</p>
                        </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
