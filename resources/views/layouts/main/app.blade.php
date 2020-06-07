<html lang="pt-br" class="full-height">
<!-- head -->

<link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
@include('.layouts/main/header')
<!-- end head -->
<body>
<main>

    <div class="row">
        <p>main content</p>
        @yield('content')
    </div>


</main>

</body>
<!-- footer -->

@section('footer')
    @include('.layouts/main/footer')
@endsection

<!-- end footer -->
</html>
