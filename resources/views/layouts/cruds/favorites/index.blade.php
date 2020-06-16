@extends('layouts.main.app')
@section('title', 'Favorites')


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
    <div class="container">
        <div class="row">
            <a href="{{route('favorites.create')}}" class="btn btn-success">
                Add Favorite
            </a>
        </div>
        <div class="row">
        </div>

        <div class="row col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive table-striped text-center">
                    <caption>List of Favorites</caption>
                    <thead class="thead-light">
                    <th class="text-center" >Id</th>
                    <th class="text-center" >name</th>
                    <th class="text-center" >favorite_code</th>
                    <th class="text-center" >favorite_status</th>
                    <th class="text-center" >created at</th>
                    <th class="text-center" >updated at</th>
                    <th class="text-center" >Actions</th>

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
                            <td>
                                <div class="row container col-md-9">
                                    <div class="col-md-4 btn-group">
                                    <span class="table-remove"><button type="button"
                                                                       onclick="window.location.href='{{ route('favorites.detail',$favorite->id_favorite)}}'"
                                                                       class="btn btn-outline-info btn-rounded btn-sm my-0 ">Details
                                    </button></span>


                                        <span class="table-remove"><button type="button"
                                                                           onclick="window.location.href='{{ route('favorites.edit',$favorite->id_favorite)}}'"
                                                                           class="btn btn-outline-warning btn-rounded btn-sm my-0 "> Edit
                                    </button></span>
                                    </div>
                                    <div class="col-md-2">
                                        <form class="form-horizontal"
                                              action="{{ route('favorites.destroy', $favorite->id_favorite)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group col-sm-9">
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-rounded btn-sm my-0 "> Delete
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha favorites</p>
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
