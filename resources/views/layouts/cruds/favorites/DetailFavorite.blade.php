@extends('layouts.main.app')
@section('title', 'Deatils Favorite')


@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-info">Details Favorite</span></h4>
            </div>

        </div>


        <div class="container col-md-12 mb-3 ">
            <form class="needs-validation border border-secondary" autocomplete="off">

                <div class="form-row container">
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltip01">ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend"># </span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltip01"
                                   value="{{$detailFavorite->id_favorite}}"
                                   disabled required>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationTooltip01">Nome</label>
                        <input type="text" class="form-control" id="validationTooltip01"
                               value="{{$detailFavorite->name}}"
                               required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationTooltip02">Favorite Code</label>
                        <input type="text" class="form-control" id="validationTooltip02"
                               value="{{$detailFavorite->favorite_code}}" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row container">
                    <div class="col-md-4 mb-3">
                        <label for="favorite_status">Favorite Status</label>
                        <input type="text" class="form-control" id="favorite_status"
                               value="{{$detailFavorite->favorite_status}}" name="favorite_status" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Created at</label>
                        <input type="text" class="form-control" id="validationTooltip02"
                               value="{{$detailFavorite->created_at}}" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Updated at</label>
                        <input type="text" class="form-control" id="validationTooltip02"
                               value="{{$detailFavorite->updated_at}}" required>
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
                            <button type="button" onclick="window.location.href='{{url('/favorites')}}'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>
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
