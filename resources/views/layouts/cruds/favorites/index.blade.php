@extends('layouts.main.app')
@section('title', 'List Favorites')

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
                        class="badge badge-pill badge-secondary">List Favorites</span></h4>
            </div>

        </div>
    </div>
    <div class="container ">
        <div class="container-fluid" style="text-align:center;">
            <a href="{{route('favorites.create')}}" class="btn btn-success btn-lg btn-block">
                Add Favorite
            </a>
        </div>
        <div class=" container-fluid">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>List of Favorites</caption>
                    <thead class="thead-light">
                    <th class="text-center">Id</th>
                    <th class="text-center">name</th>
                    <th class="text-center">favorite_code</th>
                    <th class="text-center">favorite_status</th>
                    <th class="text-center">created at</th>
                    <th class="text-center">updated at</th>
                    <th class="text-center">Usuarios</th>
                    <th class="text-center">Actions</th>

                    </thead>
                    @forelse($favorites as $favorite)
                        <tbody>
                        <tr>
                            <td>{{$favorite->id_favorite}}</td>
                            <td>{{$favorite->name}}</td>
                            <td>{{$favorite->favorite_code}}</td>
                            <td>{{$favorite->favorite_status}}</td>
                            <td>{{$favorite->created_at}}</td>
                            <td>{{$favorite->updated_at}}</td>
                            <td>{{$favorite->updated_at}}</td>
                            <td>
                                <div class="container-fluid ">
                                    <a class="btn btn-outline-info btn-rounded my-0"
                                       href="{{ route('favorites.show',$favorite->id_favorite)}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="{{ route('favorites.edit',$favorite->id_favorite)}}
                                           "><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$favorite->id_favorite}}"
                                          action="{{ route('favorites.destroy', $favorite->id_favorite)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$favorite->id_favorite}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha favorites</p>
                        </tbody>
                    @endforelse
                </table>
                <!-- Pagination -->
                {{$favorites->links()}}
            </div>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
