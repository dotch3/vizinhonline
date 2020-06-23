@extends('layouts.main.app')
@section('title', 'Cadastro - Vizinho online')

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/cpf_tel_formater.js') }}"></script>

</head>

@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif

    <div class="container cadastro">
        <div class="row no-gutters">
            <div class=" fundo_img">
                <h2>Sua Foto</h2>
            </div>
            <div class="img_upload">
                <input type="file" name="foto">
            </div>

            <div class="col-10 text-center">
                <h2> Cadastro </h2>
                <form id="signin" class="needs-validation border border-secondary"
                      method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <br/>
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="last_name" placeholder="Last name">
                        <hr/>
                        <br/>
                        <input type="text" name="rg" id="rg" placeholder="RG">
                        <input type="text" name="cpf" maxlength="14" placeholder="CPF"
                               onkeydown="javascript: fMasc( this, mCPF );">
                        <hr/>
                        <br/>
                    </div>
                    <div class="form-group">
                        <input type="e-mail" name="email" placeholder="E-mail">
                        <input type="number" name="age" placeholder="Age">
                    </div>
                    <hr/>
                    <br/>

                    <div class="form-group">
                        <input type="text" name="cellphone" maxlength="17" placeholder="Cellphone"
                               onkeydown="javascript: fMasc( this, mTel );">
                        <input type="text" name="interfone" placeholder="Interfone">
                        <hr/>
                        <br/>
                    </div>
                    <hr/>
                    <br/>
                    <div>
                        <div class="form-group">
                            <input type="text" name="build" placeholder="Build name">
                            <input type="text" name="apt_umber" placeholder="Door number">
                            <hr/>
                            <br/>
                            <input type="text" name="address" placeholder="Address">
                            <input type="text" name="branch" placeholder="Intercom branch">
                            <hr/>
                            <br/>
                        </div>
                        <hr/>
                        <br/>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password">
                            <input type="rep_password" name="repeat-password" placeholder="Confirm password">
                            <hr/>
                            <br/>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary"
                                onclick="window.location.href='{{ url('/')}}'">Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
