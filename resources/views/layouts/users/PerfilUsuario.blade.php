@extends('layouts.main.app')
@section('title', 'Perfil Usuario')

<head>
    <!-- Styles -->
    <link href="./css/estilo_feed.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery and JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
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
                    <h2> Meus Itens </h2>
                    <!-- Incluindo o arquivo com o form para cadastro o ediçao de um item -->
                    <!-- Itens do usuario sao listadas a partir daqui -->

                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/furadeiraView.png')}}" alt="item" title="item"/>
                                </a>
                                <p>Furadeira</p>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/muffin.png')}}" alt="item" title="item"/>
                                </a>
                                <p>Muffin</p>
                        </div>
                    </div>

                    <!-- Vamos utilizar bootstrap cards e o estilo do feeds para ter menos mudanças -->
                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/guardasol.png')}}" alt="Cadeira e Guarda-sol"
                                         title="item"/>
                                </a>
                                <p>Cadeira e Guarda-sol</p>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/mala.png')}}" alt="Mala" title="item"/>
                                </a>
                                <p>Mala</p>
                            </article>
                        </div>
                    </div>

                    <!-- Detalhe do item publicado -->
                    <div class="row">
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/mergulho.png')}}" alt="Mergulho" title="item"/>
                                </a>
                                <p>Mergulho</p>
                            </article>
                        </div>
                        <div class="col">
                            <article class="article_items">
                                <a href="#">
                                    <img src="{{asset('/img/itens/pesca.png')}}" alt="Pesca" title="item"/>
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
