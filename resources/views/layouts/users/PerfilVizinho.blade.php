@extends('layouts.main.app')
@section('title', 'Perfil Vizinho')
<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>
<body>
@section('content')

    <!-- Main -->
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

                    <h2> Perfil {{ $user->name.' '.$user->lastname }} </h2>

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
                    <!-- Texto inicial antes dos itens do Usuario -->
                    <h2> Itens </h2>
                    <!-- Incluindo o arquivo de ver detalhes de um item -->
                    <a href="{{ route('posts', $user->id )}}"><h6 style="text-align: center"> Ver Posts </h6></a>
                    <h6 style="text-align: center"><span class="badge badge-info">(Em breve)</span></h6>
                </section>
                <section class="div_feed_items col-md-10">
                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/furadeiraView.png')}}" alt="item" title="item"/>
                                </a>
                                <p>Furadeira</p>
                            </article>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/muffinView.png')}}" alt="item" title="item"/>
                                </a>
                                <p>Muffin</p>
                            </article>
                        </div>
                    </div>

                    <!-- Vamos utilizar bootstrap cards e o estilo do feeds para ter menos mudanças -->
                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/guardasolView.png')}}" alt="Cadeira e Guarda-sol"
                                         title="item"/>
                                </a>
                                <p>Cadeira e Guarda-sol</p>
                            </article>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/malaView.png')}}" alt="Mala" title="item"/>
                                </a>
                                <p>Mala</p>
                            </article>
                        </div>
                    </div>


                </section>
            </div>
        </div>


    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Including the footer -->
</body>
@endsection
