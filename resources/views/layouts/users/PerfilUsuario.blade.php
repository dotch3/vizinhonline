@extends('layouts.main.app')
@section('title', 'Perfil Usuario')

<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Main -->
    @section('content')
    <main class="main">
        <div class="row ">
            <!-- Panel esquerdo -->
            <div class="col-md-4">
                <!-- Including panel esquerdo do usuario: UserData -->
                <div class="menu-lateral">
                    <!-- Including panel esquerdo do usuario: UserData -->
                    @include('.layouts/users/UserData')
                </div>
            </div>
            <!-- Panel dereito -->
            <div class="col-md-8 container">
                <!-- Seccao de items -->
                <section class="div_feed_items col-md-10">
                    <!-- Texto inicial antes dos itens do Usuario -->

                    <h2> Meu perfil </h2>

                    <div class="row">
                        <div class="col-6">
                            <label for="name" style="font-size:12px">Nome</label>
                            <input type="text" name="name" value="{{ $user->name.' '.$user->lastname}}" required>
                        </div>
                        <div class="col-6">
                            <label for="email" style="font-size:12px">E-mail</label>
                            <input type="email" name="email"
                                value="{{ !empty($user->id) ? $user->email: 'Sem e-mail cadastrado' }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="building" style="font-size:12px">Bloco/Edifício</label>
                            <input type="text" name="building"
                                value="{{ !empty($user->location) ? $user->location->building: 'Sem bloco cadastrado' }}">
                            <!-- Relation with locations come here -->
                        </div>
                        <div class="col-6">
                            <label for="apartment_number" style="font-size:12px">Nro Apto</label>
                            <input type="text" name="apartment_number"
                                value="{{ !empty($user->location) ? $user->location->apartment_number: 'Sem apartamento cadastrado' }}"
                                required> <!-- Relation with locations come here -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="celular" style="font-size:12px">Celular</label>
                            <input type="text" name="cellphone"
                                value="{{ !empty($user->id) ? $user->cellphone: 'Sem celular cadastrado' }}"
                                onkeydown="javascript: fMasc( this, mTel );" required>
                        </div>
                        <div class="col-6">
                            <label for="intercom_branch" style="font-size:12px">Interfone</label>
                            <input type="text" name="intercom_branch"
                                value="{{ !empty($user->location) ? $user->location->intercom_branch: 'Sem interfone cadastrado' }}">
                        </div>
                    </div>
                    <!-- Incluindo o arquivo com o form para cadastro o ediçao de um item -->
                    <!-- Itens do usuario sao listadas a partir daqui -->



                </section>

                
                <section class="div_feed_items col-md-10">

                    <h2> Meus Itens </h2>
                    <!-- Incluindo o arquivo com o form para cadastro o ediçao de um item -->
                    <!-- Itens do usuario sao listadas a partir daqui -->
                    <h6 style="text-align: center"><span class="badge badge-info">(Em breve)</span></h6>

                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/furadeiraView.png')}}" alt="item" title="item" />
                                </a>
                                <p>Furadeira</p>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/muffin.png')}}" alt="item" title="item" />
                                </a>
                                <p>Muffin</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/guardasol.png')}}" alt="Cadeira e Guarda-sol"
                                        title="item" />
                                </a>
                                <p>Cadeira e Guarda-sol</p>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/mala.png')}}" alt="Mala" title="item" />
                                </a>
                                <p>Mala</p>
                            </article>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/mergulho.png')}}" alt="Mergulho" title="item" />
                                </a>
                                <p>Mergulho</p>
                            </article>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/pesca.png')}}" alt="Pesca" title="item" />
                                </a>
                                <p>Mala</p>
                            </article>
                        </div>
                    </div>

                    <h2>Adicione mais itens</h2>
                    <div class="row border-light">
                        <div class="col-md-12">
                            <div class="card  border-light">
                                <div class="card-body">
                                    @include('.layouts/items/EditItemData')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </main>
    <!-- Including the footer -->
</body>
@endsection