@extends('layouts.main.app')
@section('title', 'Editar favorito')


@section('content')


    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-warning">Editar Favorito</span></h4>
            </div>

        </div>


        <div class="container col-md-12 mb-3 ">
            <form class="needs-validation border border-secondary" method="POST"
                  action="{{ route('favorites.update',$favorite->id)}}" autocomplete="off">
                @method('PATCH')
                @csrf
                <div class="form-row container">
                    <div class="col-md-2 mb-3">
                        <label for="id">ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend"># </span>
                            </div>
                            <input type="text" class="form-control" id="id"
                                   value="{{$favorite->id}}" name="id"
                                   disabled required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name"
                               value="{{$favorite->name}}" name="name"
                               required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" id="description"
                               value="{{$favorite->description}}" name="description" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code"
                               value="{{$favorite->code}}" name="code" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row container">
                    <div class="col-md-3 mb-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status"
                               value="{{$favorite->status}}" name="status" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="created_at">Created at</label>
                        <input type="text" class="form-control" id="created_at"
                               value="{{$favorite->created_at}}" name="created_at" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="updated_at">Updated at</label>
                        <input type="text" class="form-control" id="updated_at"
                               value="{{$favorite->updated_at}}" name="updated_at" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row container">
                    <h6 class="heading-small text-primary mb-4">Usuarios:</h6>
                    <div class="col-md-4 mb-3">
                        <label for="user_id">User Id</label>
                        <input type="text" class="form-control" id="user_id"
                               value="{{$favorite->id}}" name="user_id" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-3">
                        </div>

                        <div class="col-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/favorites'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>

                            <button class="btn btn-outline-warning btn-lg " type="submit">Editar</button>

                        </div>
                        <div class="col-3">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
