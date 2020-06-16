@extends('layouts.main.app')
@section('title', 'Details User')

@section('content')
    <div class="container">
        <div class="container row card">
            <div class=" jumbotron version_banner">
                <div class="row">
                    <h4><span
                            class="badge badge-pill badge-secondary">Details User</span></h4>
                </div>

            </div>
        </div>
        <div class="row container ">
            <div class="container col-md-12 mb-3">
                <form class="needs-validation border border-secondary">
                    <div class="form-row container">
                        <div class="col-md-2 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name"
                                   value="{{$detailsUser->name}}" name="name"
                                   required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">LastName</label>
                            <input type="text" class="form-control" id="last_name"
                                   value="{{$detailsUser->last_name}}" name="last_name"
                            >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg"
                                   value="{{$detailsUser->rg}}" name="rg" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email"
                                   value="{{$detailsUser->email}}" name="email" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text"
                                                  id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="username"
                                       aria-describedby="validationTooltipUsernamePrepend"
                                       value="{{$detailsUser->username}}" name="username" required>
                                <div class="invalid-tooltip">
                                    Por favor digite um unico e valido username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password"
                                   value="{{$detailsUser->password}}" name="password" required>
                            <div class="invalid-tooltip">
                                Por favor digite uma senha .
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf"
                                   value="{{$detailsUser->cpf}}" name="cpf"
                            >
                            <div class="invalid-tooltip">
                                Por favor digite um CPF valido
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age"
                                   value="{{$detailsUser->age}}" name="age">
                            <div class="invalid-tooltip">
                                Por favor digite um numero valido .
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cellphone">Cellphone</label>
                            <input type="tel" class="form-control" id="cellphone"
                                   value="{{$detailsUser->cellphone}}" name="cellphone">
                            <div class="invalid-tooltip">
                                Por favor digite um numero de celular.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="ranking">Ranking</label>
                            <input type="number" class="form-control" id="ranking"
                                   value="{{$detailsUser->ranking}}" name="ranking" disabled>
                            <div class="invalid-tooltip">
                                Por favor digite um numero valido.
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="image_id">Image ID</label>
                            <input type="text" class="form-control" id="image_id"
                                   value="{{$detailsUser->image_id}}" name="image_id">
                            <div class="invalid-tooltip">
                                image id invalido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep"
                                   value="" placeholder="Will get info from the model" name="cep">
                            <div class="invalid-tooltip">
                                Por favor digite um CEP valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city"
                                   value="" placeholder="Will get info from the model" name="city">
                            <div class="invalid-tooltip">
                                Por favor digite uma ciudad
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-3 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select" id="state" name="state">
                                <option selected disabled value=""></option>
                                <option value="RJ">Rio</option>
                                <option value="MG">Minas</option>
                            </select>
                            <div class="invalid-tooltip">
                                Por favor escolha um estado.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country"
                                   value="" placeholder="Will get info from the model" name="country">
                            <div class="invalid-tooltip">
                                Por favor digite um Pais valido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="created_at">Created at</label>
                            <input type="text" class="form-control" id="created_at" name="created_at"
                                   value="{{$detailsUser->created_at}}" disabled>
                            <div class="invalid-tooltip">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="updated_at">Updated at</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                   value="{{$detailsUser->update_at}}" disabled>
                            <div class="invalid-tooltip">
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
                                <button type="button" class="btn btn-secondary btn-lg " onclick="
                                    window.location.href='{{ route('users.index')}}'"
                                >Voltar
                                </button>

                                {{--                                <button class="btn btn-success btn-lg " type="submit">Create user</button>--}}

                                {{--                            <button class="btn btn-outline-danger btn-lg " type="submit">Delete</button>--}}
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@endsection
