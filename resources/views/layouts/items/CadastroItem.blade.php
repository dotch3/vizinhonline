@extends('layouts.main.app')
@section('title', 'Cadastro de itens')
<head>
    <link href="{{ asset('/css/estilo_feed.css') }}" rel="stylesheet">
</head>
<body>
@section('content')

    <main class="main">
        <div class="col-md-12">
            <div class="row ">
                <div class="container col-md-4">
                    <!-- Including the left panel with the UserData -->
                    @include('.layouts/users/UserData')
                </div>
                <!-- Carrega form cadastro dos itens. -->
                <div class="container col-md-8">
                    <h2 style="text-align:left;"> Cadastro de itens </h2>
                    @include('.layouts/items/viewItemData')
                </div>
            </div>
            <div class="row ">
                <!-- carrega detalhe dos itens -->
                <section>
{{--                    @include('.layouts/items/DetalheDoItem')--}}
                </section>
            </div>
        </div>
    </main>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

@endsection

</body>
