@extends('layouts.main.app')
@section('title', 'Cadastro - Vizinho online')

<head>
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
        <form id="signin" class="needs-validation"
              enctype="multipart/form-data"
              method="post"
              action="{{route('register')}}"
              autocomplete="off">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-4">


                    <div class="personal-image">
                        <div class="profile-img img_upload">
                            <label class="label">
                                <input type="file" multiple accept='image/*' name="image" id="image"
                                       style="width: 200px;">
                                <figure class="personal-figure">
                                    <img id="imgProfile" src="storage/avatar/fundo.png" class="personal-avatar"
                                         alt="avatar">
                                    <figcaption class="personal-figcaption">
                                        <img
                                            src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"
                                            alt="foto">
                                    </figcaption>
                                </figure>
                            </label>
                        </div>
                    </div>


                    {{-- <div class="fundo_img" style="display">



                    {{-- </div> --}}


                </div>
                <script
                    src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous"></script>
                <script>
                    $(function () {
                        $('#image').change(function () {
                            $('#imgProfile').show();
                            const file = $(this)[0].files[0];
                            console.log(file);
                            const fileReader = new FileReader();
                            fileReader.onloadend = function () {
                                $('#imgProfile').attr('src', fileReader.result)
                            }
                            fileReader.readAsDataURL(file)

                        })
                    })
                </script>
                <div class="col-md-8">
                    <div class="profile-head col-10 text-center">
                        <h2> Cadastro </h2>
                        <div class="row">
                            <div class="col-5">
                                <input type="text" name="name" placeholder="Nome" value="" required>
                            </div>
                            <div class = "col-5">
                                <input type="text" name="lastname"  id="lastname" placeholder="Sobrenome" value="" required>
                            </div>
                        </div>
                            <br/>
                        <div class="row">
                            <div class = "col-5">
                                <input type="text" name="rg" id="rg" placeholder="RG" value="" required>
                            </div>
                            <div class="col-5">
                                <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="CPF" value="" required
                                       onkeydown="javascript: fMasc( this, mCPF ); ">
                            </div>

                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-5">
                                <input type="email" name="email" placeholder="E-mail" value="" required>
                            </div>
                            <div class="col-5">
                                <input type="email_verified" name="email" placeholder="Confirmar E-mail" value=""
                                       required>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-5">
                                <input type="text" name="cellphone" maxlength="17" placeholder="Celular" value=""
                                       onkeydown="javascript: fMasc( this, mTel );" required>
                            </div>
                            <div class="col-5">
                                <input type="text" name="age" placeholder="Idade" value="">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-5">
                                <input type="text" name="building" placeholder="Bloco/Edificio" value="">
                                <!-- Relation with locations come here -->
                            </div>
                            <div class="col-5">
                                <input type="text" name="apartment_number" placeholder="Nro Apto" value="" required>
                                <!-- Relation with locations come here -->
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-5">
                                <input type="text" name="address" placeholder="Endereço" value="">
                                <!-- Relation with locations come here -->
                            </div>
                            <div class="col-5">
                                <input type="text" name="intercom" placeholder="Interfone" value="">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-5">
                            <input id="password" type="password" placeholder="Senha" name="password" required autocomplete="new-password">
                            </div>
                            <div class="col-5">
                                <!-- <input type="password" name="password-confirm" placeholder="Confirmar senha" required value=""> -->
                                <input id="password-confirm" type="password" placeholder="Confirmar Senha" name="password_confirmation" required autocomplete="new-password">

                            </div>

                        </div>
                        <br>
                        <div>
                            <button type="button" class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">Cadastrar</button>

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
