@extends('layouts.main.app')
@section('title', 'Lista de Endereços')

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
                        class="badge badge-pill badge-secondary">Lists de Endereços</span></h4>
            </div>
        </div>
    </div>
    <div class="container col-md-12">
        <div class="container col-md-10">
            <div class="container" style="text-align:center;">
                <a href="{{route('locations.create')}}" class="btn btn-success btn-lg btn-block">
                    Criar Endereço
                </a>
            </div>
        </div>
        <div class=" container col-md-10">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>Lista de endereços</caption>
                    <thead class="black white-text">
                    <th class="text-center">Id</th>
                    <th class="text-center">building</th>
                    <th class="text-center">apartment_number</th>
                    <th class="text-center">address</th>
                    <th class="text-center">USER->id</th>
                    <th class="text-center" scope="col">Ação</th>
                    </thead>
                    @forelse($locations as $location)
                        <tbody>
                        <tr>
                            <td>{{$location->id}}</td>
                            <td>{{$location->building}}</td>
                            <td>{{$location->apartment_number}}</td>
                            <td>{{$location->address}}</td>
                            <td>{{ !empty($location->user) ? $location->user->id : '' }}</td>

                            <td>
                                <div class=" container-fluid">
                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="{{route('locations.edit',$location->id)}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$location->id}}"
                                          action="{{route('locations.destroy',$location->id)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$location->id}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded btn-sm my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha locations</p>
                        </tbody>
                    @endforelse
                </table>

                <button type="button" onclick="window.location.href='/'"
                        class="btn btn-outline-secondary btn-lg ">Voltar
                </button>
                <!-- Pagination -->
                {{$locations->links()}}
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@endsection
