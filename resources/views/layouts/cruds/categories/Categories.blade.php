@extends('layouts.main.app')
@section('title', 'Categories')




@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">Lista de categorias</span></h4>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href="{{route('categories.create')}}" class="btn btn-success">
                Adicionar categoria
            </a>
        </div>
        <div class="row">
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-dark table-bordered table-hover table-sm">
                    <caption>Lista de categorias</caption>
                    <thead class="thead-light">
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">category_code</th>
                    <th scope="col">description</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">Ação</th>
                    </thead>
                    @forelse($categories as $category)
                        <tbody>
                        <tr>
                            <td>{{$category->id_category}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->category_code}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td>
                                <div class="row">
                                    <button type="button"
                                            onclick="window.location.href='{{ route('categories.edit', $category->id_category)}}'"
                                            class="btn btn-outline-warning "> Editar
                                    </button>
                                    <form class="form-inline"
                                    action="{{ route('categories.destroy', $category->id_category)}}"
                                    method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        class="btn btn-outline-danger "> Deletar
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nenhuma categoria para listar</p>
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
