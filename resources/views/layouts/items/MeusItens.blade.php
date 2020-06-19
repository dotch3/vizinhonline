@extends('layouts.main.app')
@section('title', 'Meus Itens')

<head>
    <link href="./css/estilo_feed.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<main class="main">
    <div class="col-md-12">
        <div class="row ">
            <div class="container col-md-4">
                <!-- Including the left panel with the UserData -->
                @include('.layouts/users/UserData')
            </div>
            <!-- Carrega meus itens. -->
            <div class="container col-md-8">
                <h2 style="text-align:left;"> Meus itens </h2>
                @include('.layouts/items/MeusItensMain')
            </div>
            <!-- Carrega os itens container col-md-4 -->
            <div class="container col-md-4 mb-5">
                <h2 style="text-align:left;"> Outros itens </h2>
                @include('.layouts/items/DetalheDoItem')
            </div>
        </div>
    </div>
</main>
<!-- Including the footer -->

</body>

</html>
