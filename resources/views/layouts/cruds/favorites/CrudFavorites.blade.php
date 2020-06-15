@extends('layouts.main.app')
@section('title', 'Favorites')




@section('content')
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

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-dark table-bordered table-hover table-sm">
                    <caption>List of Favorites</caption>
                    <thead class="thead-light">
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">favorite_code</th>
                    <th scope="col">favorite_status</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">Ação</th>
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
                                <div class="row">

                                    {{-- Vamos a chamar ao controller--}}
                                    <button type="button"
                                            onclick="window.location.href='/detailFavorite/{{$favorite->id_favorite}}'"
                                            class="btn btn-outline-primary ">Details
                                        - {{$favorite->id_favorite}}
                                    </button>
                                    {{--                                    <a href="/detailFavorite/{{$favorite->id_favorite}}"--}}
                                    {{--                                       class="btn btn-outline-secondary">--}}
                                    {{--                                        Details--}}
                                    {{--                                        - {{$favorite->id_favorite}}</a>--}}
                                    <button type="button"
                                            onclick="window.location.href='{{ route('favorites.edit',$favorite->id_favorite)}}'"
                                            class="btn btn-outline-warning "> Edit
                                        - {{$favorite->id_favorite}}
                                    </button>
                                    {{--                                    <a href="{{ route('favorites.edit',$favorite->id_favorite)}}"--}}
                                    {{--                                       class="btn btn-outline-warning">--}}
                                    {{--                                        Edit--}}
                                    {{--                                        - {{$favorite->id_favorite}}</a>--}}
                                    <form class="form-inline"
                                          action="{{ route('favorites.destroy', $favorite->id_favorite)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger "> Delete
                                            - {{$favorite->id_favorite}}
                                        </button>
                                        {{--                                        <a href="/deleteFavorite/{{$favorite->id_favorite}}"--}}
                                        {{--                                           class="btn btn-outline-danger">--}}
                                        {{--                                            Delete--}}
                                        {{--                                            - {{$favorite->id_favorite}}</a>--}}
                                    </form>
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
