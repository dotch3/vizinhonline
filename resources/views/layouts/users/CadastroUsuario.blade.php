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
            <div class="col-3 fundo_img">
                <h2>Sua Foto</h2>
            </div>
            <div class="img_upload">
                <input type="file" name="foto">
            </div>

            <div class="col-1"></div>

            <div class="col-5 text-center">
                <h2> Cadastro </h2>
                <form id="signin" class="needs-validation border border-secondary"
                      method="post" action="{{ route('users.store') }}">
                    @csrf

                    <input type="text" name="nome" placeholder="Nome Completo">
                    <hr/>
                    <br/>
                    <input type="e-mail" name="email" placeholder="Seu e-mail">
                    <hr/>
                    <br/>
                    <input type="text" name="cpf" maxlength="14" placeholder="CPF"
                           onkeydown="javascript: fMasc( this, mCPF );">
                    <hr/>
                    <br/>
                    <div>
                        <div class="form-group">
                            <input type="text" name="telefone" maxlength="14" placeholder="Telefone"
                                   onkeydown="javascript: fMasc( this, mTel );">
                            <input type="text" name="interfone" placeholder="Interfone">
                            <hr/>
                            <br/>
                        </div>
                        <hr/>
                        <br/>
                        <div>
                            <div class="form-group">
                                <input type="text" name="ap" placeholder="Apto">
                                <input type="text" name="bloco" placeholder="Bloco">
                                <hr/>
                                <br/>
                            </div>
                            <hr/>
                            <br/>
                            <div class="form-group">
                                <input type="text" name="password" placeholder="Senha">
                                <input type="text" name="repeat-password" placeholder="Confirmar Senha">
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
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
