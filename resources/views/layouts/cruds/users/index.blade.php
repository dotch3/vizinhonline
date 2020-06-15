@extends('layouts.main.app')
@section('title', 'List Users')




@section('content')
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
            <div class="table-responsive-md">
                <table class="table table-striped table-dark table-bordered table-hover table-sm">
                    <caption>List of Users</caption>
                    <thead class="thead-light">
                    <th scope="col">Id</th>
                    <th scope="col">RG</th>
                    <th scope="col">name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Cellphone</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Age</th>
                    <th scope="col">Ranking</th>
                    <th scope="col">Image Id</th>
{{--                    <th scope="col">Created at</th>--}}
{{--                    <th scope="col">Updated at</th>--}}
                    <th scope="col">Ação</th>
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
{{--                            <td>{{$user->created_at}}</td>--}}
{{--                            <td>{{$user->updated_at}}</td>--}}
                            <td>
                                <div class="row">

                                    {{-- Vamos a chamar ao controller--}}
                                    <button type="button"
                                            onclick="window.location.href='/detailsUser/{{$user->id_user}}'"
                                            class="btn btn-outline-primary ">Details
                                        - {{$user->id_user}}
                                    </button>
                                    <button type="button"
                                            onclick="window.location.href='{{ route('users.edit',$user->id_user)}}'"
                                            class="btn btn-outline-warning "> Edit
                                        - {{$user->id_user}}
                                    </button>
                                    <form class="form-inline"
                                          action="{{ route('users.destroy', $user->id_user)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger "> Delete
                                            - {{$user->id_user}}
                                        </button>

                                    </form>
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
