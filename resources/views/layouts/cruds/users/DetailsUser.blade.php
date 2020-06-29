@extends('layouts.main.app')
@section('title', 'Detalhes do usuario')

@section('content')
    <div class="container">
        <div class="container">
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
                    <h6 class="heading-small text-info mb-4">Seção usuario</h6>
                    <div class="form-row container">
                        <div class="container-fluid col-md-4 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name"
                                   value="{{$detailsUser->name}}" name="name"
                                   required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">LastName</label>
                            <input type="text" class="form-control" id="last_name"
                                   value="{{$detailsUser->lastname}}" name="last_name"
                            >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg"
                                   value="{{$detailsUser->rg}}" name="rg">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text"
                                                  id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input type="email" class="form-control" id="email"
                                       value="{{$detailsUser->email}}" name="email" required>
                                <div class="valid-tooltip">
                                    Looks good!
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
                            <input type="text" class="form-control" id="age"
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
                                   value="{{$detailsUser->ranking}}" name="ranking">
                            <div class="invalid-tooltip">
                                Por favor digite um numero valido.
                            </div>
                        </div>
                        <div class="form-row container">
                            <div class="col-md-4 mb-3">
                                <label for="created_at">Created at</label>
                                <input type="text" class="form-control" id="created_at" name="created_at"
                                       value="{{$detailsUser->created_at}}" >
                                <div class="invalid-tooltip">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="updated_at">Updated at</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at"
                                       value="{{$detailsUser->updated_at}}" >
                                <div class="invalid-tooltip">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="updated_at">Deleted at(soft)</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at"
                                       value="{{$detailsUser->deleted_at}}" >
                                <div class="invalid-tooltip">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="heading-small text-info mb-4">Seção imagem do perfil usuario</h6>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="image_id">Image ID</label>
                            <input type="text" class="form-control" id="image_id"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->image->id: '' }}"
                                   name="image_id">
                            <div class="invalid-tooltip">
                                image id invalido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="image_name">Image Name</label>
                            <input type="text" class="form-control" id="image_name"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->image->id: '' }}"
                                   name="image_name">
                            <div class="invalid-tooltip">
                                image_name invalido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="image_slug">Slug</label>
                            <input type="text" class="form-control" id="image_slug"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->image->slug: '' }} "
                                   name="image_slug">
                            <div class="invalid-tooltip">
                                image_slug invalido
                            </div>
                        </div>

                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="format_image">Format image</label>
                            <input type="text" class="form-control" id="format_image"
                                   value="{{ !empty($detailsUser->image->format_image) ? $detailsUser->image->format_image: '' }} "
                                   name="format_image">
                            <div class="invalid-tooltip">
                                format_image invalido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="path_location">Path Location</label>
                            <input type="text" class="form-control" id="path_location"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->image->path_location: '' }}"
                                   name="path_location">
                            <div class="invalid-tooltip">
                                path_image invalido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="size_image">Size image</label>
                            <input type="text" class="form-control" id="size_image"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->image->size_image: '' }} "
                                   name="size_image">
                            <div class="invalid-tooltip">
                                size image invalido
                            </div>
                        </div>
                    </div>
                    <h6 class="heading-small text-info mb-4">Seção endereço do usuario</h6>
                    <div class="form-row container">
                        <div class="col-md-6 mb-3">
                            <label for="building">Bloco</label>
                            <input type="text" class="form-control" id="building"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->location->building: '' }} "
                                   placeholder="Bloco/Edificio" name="building">
                            <div class="invalid-tooltip">
                                Por favor digite um Bloco valido
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apartment_number">Nro. Apto</label>
                            <input type="text" class="form-control" id="apartment_number"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->location->apartment_number: '' }}"
                                   placeholder="Nro. Apartamento" name="apartment_number">
                            <div class="invalid-tooltip">
                                Por favor digite um numero de apartamento
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-6 mb-3">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="address"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->location->address: '' }}"
                                   placeholder="Endereço" name="address">
                            <div class="invalid-tooltip">
                                Por favor digite um endereço.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="intercom_branch">Interfone #</label>
                            <input type="text" class="form-control" id="intercom_branch"
                                   value="{{ !empty($detailsUser->image->id) ? $detailsUser->location->intercom_branch: '' }}"
                                   placeholder="Interfone #" name="intercom_branch">
                            <div class="invalid-tooltip">
                                Por favor digite um interfone valido
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
                                <button type="button" class="btn btn-outline-secondary btn-lg " onclick="
                                    window.location.href='{{ route('users.index')}}'"
                                >Voltar
                                </button>
                                <button type="button" class="btn btn-secondary btn-lg " onclick="
                                    window.location.href='{{ route('user.profile',$detailsUser->id)}}'"
                                >CadastroView
                                </button>
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
