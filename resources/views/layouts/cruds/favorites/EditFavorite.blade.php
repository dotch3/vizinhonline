@extends('layouts.main.app')
@section('title', 'Detalhes')


@section('content')


    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-warning">Edit Favorite</span></h4>
            </div>

        </div>


        <div class="container col-md-12 mb-3 ">
            <form class="needs-validation border border-secondary" method="POST"
                  action="{{ route('favorites.update',$favorite->id_favorite)}}" autocomplete="off">
                @method('PATCH')
                @csrf
                <div class="form-row container">
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltip01">ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend"># </span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltip01"
                                   value="{{$favorite->id_favorite}}"
                                   disabled required>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationTooltip01">Nome</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                               value="{{$favorite->name}}" name="name"
                               required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="favorite_code">Favorite Code</label>
                        <input type="text" class="form-control" id="favorite_code"
                               value="{{$favorite->favorite_code}}" name="favorite_code" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row container">
                    <div class="col-md-4 mb-3">
                        <label for="favorite_status">Favorite Status</label>
                        <input type="text" class="form-control" id="favorite_status"
                               value="{{$favorite->favorite_status}}" name="favorite_status" required>
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
