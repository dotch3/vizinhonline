@extends('layouts.main.app')
@section('title', 'Editar Usuario - Vizinho online')

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
        <form id="signin" class="needs-validation" enctype="multipart/form-data" method="post"
              action="{{empty($user->id) ? route('users.new') : route('users.register',$user->id) }}"
              autocomplete="off">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-4">
                    @if(!empty($user->image->id))
                        {{--                    @elseif(Storage::disk('public')->exists($user->image->name))--}}

                        {{-- <img src="{{asset('/storage/avatar/'.$user->image->slug)}}" id="imgProfile" class="profile"
                             style="width: 180px;height: 170px; "> --}}
                        <div class="personal-image">
                            <div class="profile-img img_upload">
                                <label class="label">
                                    <input type="file" multiple accept='image/*' name="image" id="image">
                                    <figure class="personal-figure">
                                        <img id="imgProfile" src="{{asset('/storage/avatar/'.$user->image->slug)}}"
                                             style="width: 200px;" class="personal-avatar" alt="avatar">
                                        <figcaption class="personal-figcaption">
                                            <img
                                                src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"
                                                alt="foto">
                                        </figcaption>
                                    </figure>
                                </label>
                            </div>
                        </div>

                    @else
                        {{-- <div class=" fundo_img">

                            <h2>Sua Foto</h2>
                        </div> --}}
                        <div class="personal-image">
                            <div class="profile-img img_upload">
                                <label class="label">
                                    <input type="file" multiple accept='image/*' name="image" id="image"
                                           style="width: 200px;">
                                    <figure class="personal-figure">
                                        <img id="imgProfile" src="img/avatar/fundo.png" class="personal-avatar"
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
                    @endif
                </div>
                {{-- <div class="profile-img img_upload">
                    <input type="file" multiple accept='image/*' name="image" id="image">
                </div> --}}
                <script
                    src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous"></script>
                <script>
                    $(function () {
                        $('#image').change(function () {
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
                <div class="col-md-6">
                    <div class="profile-head col-10 text-center">
                        <h2> Editar Usuário </h2>
                        <div class="row">
                            <div class="col-6">
                                <label for="name" style="font-size:12px">Nome</label>
                                <input type="text" name="name" placeholder="Nome"
                                       value="{{ !empty($user->id) ? $user->name : '' }}" required>
                            </div>
                            <div class="col-6">
                                <label for="sobrenome" style="font-size:12px">Sobrenome</label>
                                <input type="text" name="lastname" placeholder="Sobrenome"
                                       value="{{ !empty($user->id) ? $user->lastname : '' }}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="rg" style="font-size:12px">RG</label>
                                <input type="text" name="rg" id="rg" placeholder="RG"
                                       value="{{ !empty($user->id) ? $user->rg: '' }}" required>
                            </div>
                            <div class="col-6">
                                <label for="CPF" style="font-size:12px">CPF</label>
                                <input type="text" name="cpf" maxlength="14" placeholder="CPF"
                                       value="{{ !empty($user->id) ? $user->cpf: '' }}" required
                                       onkeydown="javascript: fMasc( this, mCPF ); ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="email" style="font-size:12px">E-mail</label>
                                <input type="email" name="email" placeholder="E-mail"
                                       value="{{ !empty($user->id) ? $user->email: '' }}" required>
                            </div>
                            <div class="col-6">
                                <label for="email" style="font-size:12px">Confirmar E-mail</label>
                                <input type="email_verified" name="email" placeholder="Confirmar E-mail"
                                       value="{{ !empty($user->id) ? $user->email: '' }}" required>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-6">
                                <label for="celular" style="font-size:12px">Celular</label>
                                <input type="text" name="cellphone" maxlength="17" placeholder="Celular"
                                       value="{{ !empty($user->id) ? $user->cellphone: '' }}"
                                       onkeydown="javascript: fMasc( this, mTel );" required>
                            </div>
                            <div class="col-6">
                                <label for="age" style="font-size:12px">Idade</label>
                                <input type="text" name="age" placeholder="Idade"
                                       value="{{ !empty($user->id) ? $user->age: '' }}">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-6">
                                <label for="building" style="font-size:12px">Bloco/Edifício</label>
                                <input type="text" name="building" placeholder="Bloco/Edificio"
                                       value="{{ !empty($user->location) ? $user->location->building: '' }}">
                                <!-- Relation with locations come here -->
                            </div>
                            <div class="col-6">
                                <label for="apartment_number" style="font-size:12px">Nro Apto</label>
                                <input type="text" name="apartment_number" placeholder="Nro Apto"
                                       value="{{ !empty($user->location) ? $user->location->apartment_number: '' }}"
                                       required>  <!-- Relation with locations come here -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="address" style="font-size:12px">Endereço</label>
                                <input type="text" name="address" placeholder="Endereço"
                                       value="{{ !empty($user->location) ? $user->location->address: '' }}">
                                <!-- Relation with locations come here -->
                            </div>
                            <div class="col-6">
                                <label for="intercom_branch" style="font-size:12px">Interfone</label>
                                <input type="text" name="intercom_branch" placeholder="Interfone"
                                       value="{{ !empty($user->location) ? $user->location->intercom_branch: '' }}">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-6">
                                <label for="password" style="font-size:12px">Senha</label>
                                <input type="password" name="password" placeholder="Senha" required
                                       value="{{ !empty($user->id) ? $user->password: '' }}">
                            </div>
                            <div class="col-6">
                                <label for="confirm_password" style="font-size:12px">Confirmar Senha</label>
                                <input type="password" name="confirm_password" placeholder="Confirmar senha" required
                                       value="{{ !empty($user->id) ? $user->password: '' }}">
                            </div>
                        </div>
                        <br/>
                        <div>
                            <button type="button" class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Voltar
                            </button>
                            @if(empty($user->id))

                                <button type="submit" class="btn btn-success">Cadastrar</button>

                            @else

                                <button type="submit" class="btn btn-warning">Editar</button>

                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
