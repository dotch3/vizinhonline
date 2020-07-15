<html lang="pt-br">
<!-- head -->

<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
@section('header')
    @include('.layouts/main/Header')
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
<!-- Scripts -->
ß
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>

</body>
<!-- footer -->

@section('footer')
    @include('.layouts/main/Footer')
@show()



<!-- end footer -->
</html>
