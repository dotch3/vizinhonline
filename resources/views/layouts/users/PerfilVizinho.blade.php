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
                    <h2> Itens {{$user->name.' '.$user->lastname}} </h2>
                    <!-- Incluindo o arquivo de ver detalhes de um item -->

                    <h3> Em breve </h3>

                <a href="{{ route('posts', $user->id )}}"><h3> Ver posts </h3></a>


                    <!-- Itens do usuario sao listadas a partir daqui -->
                    <!-- Vamos utilizar bootstrap cards e o estilo do feeds para ter menos mudanças -->
                    <!-- modal detalhe do item -->
                    <div class="modal fade" id="modaldetalhe" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Item</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="row border-light">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="">
                                                @include('.layouts/items/ViewItemData')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-dismiss="modal" data-target="#modalInteresse">Eu Quero
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Modal Mensagem de Interesse -->
                    <div class="modal fade" id="modalInteresse" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Mensagem</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="row border-light">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="">
                                                @include('.layouts/items/Interesse')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            data-toggle="modal" data-target="#modalSucesso">Enviar
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Modal Sucesso -->
                    <div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Mensagem Enviada</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <p>Um e-mail foi enviado para o proprietário do objeto! </p>
                                <BR>
                                <p>Em breve retornará o contato! </p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            data-toggle="modal">Ok
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
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
