<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/estilo_header.css') }}" rel="stylesheet">
    <title>Home - Vizinho online</title>
</head>

<body>
<main>
    <div class="row">
        <header class="header">
            <nav>
                <ul class="nav">
                    <li class="nav-item col-2 mt-1"><img src="{{asset('/img/icons/logo.png')}}" width="90" height="80" alt="logo" title="logo" class="logo"></li>
                    <li class="nav-item col-7 mt-4">

                    <button class="buttonHeader" onclick="window.location.href='{{route('users.new')}}'">Cadastre-se</button>

                </li>

                    <li class="nav-item col-3 mt-4">
                        <button onclick="window.location.href='/login'" class="buttonHeader">Login </button>
                        
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="row">
        <div class="banner">
            <img src={{asset('/img/banner/1.png')}} alt="banner">
        </div>
    </div>
    <div class="row">

        <div class="fundoTexto">
            <h2>Como funciona?</h2>
            <div class="col-2">
            </div>
            <div class="texto col-10">
                <p>
                    Quem nunca precisou de algo que não tinha no momento? Uma furadeira... uma forma de bolo...
                    <br>Já pensou em pedir emprestado para um vizinho? Você não o conhece?
                    <br>Deixa com a gente! Aqui você vai encontrar o que precisa com as pessoas certas para
                    emprestar!
                    <br><br>Colabore você também! Compartilhe seus objetos com os vizinhos!
                </p>
            </div>
            <button onclick="window.location.href='/login'" class="buttonPage">Quero compartilhar</button>
        </div>

    </div>
    <div class="fundoCards">

        <h2>O que dizem sobre nós?</h2>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="cards">
                <img src={{asset('/img/avatar/Marcelo.png')}} >

                <div class="row">
                    <div class="estrela">
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                    </div>
                    <div class="depoimento">
                        “Muito prático, encontro de tudo o que preciso! Sem contar nas grandes amizadesvque eu fiz!”
                    </div>
                </div>
            </div>

            <div class="cards">
                <img src={{asset('/img/avatar/Lucia.png')}} >
                <div class="row">
                    <div class="estrela">
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                    </div>
                    <div class="depoimento">
                        “Depois que começamos usar o Vizinholine, nosso condominio ficou mais unido, as pessoas
                        ficaram
                        mais gentis!”
                    </div>
                </div>
            </div>

            <div class="cards">
                <img src={{asset('/img/avatar/Fernando.png')}}>
                <div class="row">
                    <div class="estrela">
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                        <img src={{asset('/img/icons/Star.png')}}>
                    </div>
                    <div class="depoimento">
                        “Nunca mais comparei coisas que sei que usarei poucas vezes! E não tenho problema em
                        emprestar
                        coisas que possuo!”
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="rodape">
                <nav>
                    <ul class="nav">
                        <li class="col-md-4"><a href="#">Quem somos</a></li>
                        <li class="col-md-4"><a href="#">Contato</a></li>
                        <li class="col-md-4">Siga-nos<a href="#"><span class="fa-facebook"></span></a>
                            <a href="#"><span class="fa-instagram"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

    @include('.layouts/main/Footer')

        

</main>
<!-- Including the footer -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>


</html>
