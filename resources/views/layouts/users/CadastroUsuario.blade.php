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
        <form id="signin" class="needs-validation border border-secondary"
              enctype="multipart/form-data"
              method="post"
              action="{{empty($user->id) ? route('users.store') : route('users.register',$user->id) }}">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-4">
                    @if(!empty($user->image->id))
                        {{--                    @elseif(Storage::disk('public')->exists($user->image->name))--}}

                        <img src="{{asset('/storage/avatar/'.$user->image->slug)}}" id="imgProfile" class="profile"
                             style="width: 180px;height: 170px; ">
                    @else
                        <div class=" fundo_img">

                            <h2>Sua Foto</h2>
                        </div>
                    @endif
                </div>
                <div class="profile-img img_upload">
                    <input type="file" multiple accept='image/*' name="foto" id="foto"
                    >

                </div>
                <script
                    src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous"></script>
                <script>
                    $(function () {
                        $('#foto').change(function () {
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
                        <h2> Cadastro </h2>
                        <div class="form-group">
                            <br/>
                            <input type="text" name="name" placeholder="Nome"
                                   value="{{ !empty($user->id) ? $user->name : '' }}"
                                   required>
                            <input type="text" name="lastname" placeholder="Sobrenome"
                                   value="{{ !empty($user->id) ? $user->lastname : '' }}"
                                   required>
                            <hr/>
                            <br/>
                            <input type="text" name="rg" id="rg" placeholder="RG"
                                   value="{{ !empty($user->id) ? $user->rg: '' }}"
                                   required>
                            <input type="text" name="cpf" maxlength="14" placeholder="CPF"
                                   value="{{ !empty($user->id) ? $user->cpf: '' }}"
                                   required
                                   onkeydown="javascript: fMasc( this, mCPF ); ">
                            <hr/>
                            <br/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail"
                                   value="{{ !empty($user->id) ? $user->email: '' }}"
                                   required>
                            <input type="email_verified" name="email" placeholder="Confirmar E-mail"
                                   value="{{ !empty($user->id) ? $user->email: '' }}"
                                   required>


                        </div>
                        <hr/>
                        <br/>

                        <div class="form-group">
                            <input type="text" name="cellphone" maxlength="17" placeholder="Celular"
                                   value="{{ !empty($user->id) ? $user->cellphone: '' }}"
                                   onkeydown="javascript: fMasc( this, mTel );" required>
                            <input type="text" name="age" placeholder="Idade"
                                   value="{{ !empty($user->id) ? $user->age: '' }}">

                            <hr/>
                            <br/>
                        </div>
                        <hr/>
                        <br/>
                        <div>
                            <div class="form-group">
                                <input type="text" name="building" placeholder="Bloco/Edificio"
                                       value="{{ !empty($user->location) ? $user->location->building: '' }}">
                                <!-- Relation with locations come here -->
                                <input type="text" name="apartment_number" placeholder="Nro Apto"
                                       value="{{ !empty($user->location) ? $user->location->apartment_number: '' }}"
                                       required>  <!-- Relation with locations come here -->
                                <hr/>
                                <br/>
                                <input type="text" name="address" placeholder="Endereço"
                                       value="{{ !empty($user->location) ? $user->location->address: '' }}"
                                ><!-- Relation with locations come here -->
                                <input type="text" name="intercom_branch" placeholder="Intercom branch"
                                       value="{{ !empty($user->location) ? $user->location->intercom_branch: '' }}">
                                <hr/>
                                <br/>
                            </div>
                            <hr/>
                            <br/>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Senha" required
                                       value="{{ !empty($user->id) ? $user->password: '' }}">
                                <input type="password" name="confirm_password" placeholder="Confirmar senha" required
                                       value="{{ !empty($user->id) ? $user->password: '' }}">
                                <hr/>
                                <br/>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Cancelar
                            </button>
                            @if(empty($user->id))
                                <button type="submit" class="btn btn-success">Cadastrar
                                </button>
                            @else
                                <button type="submit" class="btn btn-warning">Editar
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
