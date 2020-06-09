<html lang="pt-br">
<!-- head -->

<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
@section('header')
    @include('.layouts/main/Header')
@show()
<!-- end head -->
<body>
<main>

    <div class="row">
        @yield('content')
    </div>


</main>

</body>
<!-- footer -->

@section('footer')
    @include('.layouts/main/Footer')
@show()



<!-- end footer -->
</html>
