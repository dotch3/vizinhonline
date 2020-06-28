@extends('layouts.main.app')
@section('title', 'Criar Endereço')
@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-success">Criar Endereço</span></h4>
            </div>

        </div>

        <div class="container row card">
            <div class="col-sm-8 offset-sm-2">
                <h2 class="display-4">Criar Endereço</h2>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif
                    <form method="post" action="{{ route('location.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="building"> Bloco/Edificio:</label>
                            <input type="text" class="form-control" name="building" id="building"/>
                        </div>
                        <div class="form-group">
                            <label for="apartment_number">Nro. Apto:</label>
                            <input type="text" class="form-control" name="apartment_number" id="apartment_number"/>
                        </div>

                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            <input type="text" class="form-control" name="address" id="address"/>
                        </div>

                        <div class="form-group">
                            <label for="intercom_branch">Interfone #:</label>
                            <input type="text" class="form-control" name="intercom_branch" id="intercom_branch"/>
                        </div>
                        <div class="form-group">
                            <label for="user_id">User ID:</label>
                            <input type="text" class="form-control" name="user_id" id="user_id"/>
                        </div>


                        <div class="col-6 btn-group btn-group-lg">
                            <button type="button" onclick="window.location.href='/favorites'"
                                    class="btn btn-outline-secondary btn-lg ">Voltar
                            </button>
                            <button type="submit" class="btn btn-outline-success btn-lg">Criar Favorito</button>

                        </div>
                        <div class="col-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
