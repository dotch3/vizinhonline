@extends('layouts.main.app')
@section('title', 'Favorites')




@section('content')
    <div class="container">
        <table class="table table-striped" border="1">
            <thead>
            <th scope="col">Id</th>
            <th scope="col">name</th>
            <th scope="col">favorite_code</th>
            <th scope="col">favorite_status</th>
            <th scope="col">Ação</th>
            </thead>
            @forelse($listFavorites as $favorite)
                <tbody>
                <tr>
                    <td>{{$favorite->id_favorite}}</td>
                    <td>{{$favorite->name}}</td>
                    <td>{{$favorite->favorite_code}}</td>
                    <td>{{$favorite->favorite_status}}</td>
                    <td>
                        {{-- Vamos a chamar ao controller--}}
                        <a href="/detailFavorite/{{$favorite->id_favorite}}" class="btn btn-outline-secondary">
                            Detalhes
                            - {{$favorite->id_favorite}}</a>
                    </td>
                </tr>
                @empty
                    <p>Nao ha favorites</p>
                </tbody>
            @endforelse
        </table>
    </div>
@endsection
@section('footer')
    @parent
@endsection
