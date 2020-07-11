<html lang="pt-br">
<!-- head -->

<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
@section('header')
    @include('.layouts/main/Headerauth')
@show()
<!-- end head -->
<body>
<main>

    @if (session('SuccessMessage'))
        <div class="alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    <div class="content">
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
