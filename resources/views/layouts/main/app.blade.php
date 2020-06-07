<html lang="pt-br" class="full-height">
<!-- head -->

<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">

@include('.layouts/main/Header')
<!-- end head -->
<body>
<main>

    <div class="row">
        @yield('content')
    </div>


</main>

</body>
<!-- footer -->


@include('.layouts/main/Footer')




<!-- end footer -->
</html>
