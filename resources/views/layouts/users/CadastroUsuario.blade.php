<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('/css/estilo.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/cpf_tel_formater.js') }}"></script>
    <title>Cadastro - Vizinho online</title>
</head>

<body>
<main>
    <div class="row">
        <header class="header">
            <nav>
                <ul class="nav">
                    <li class="nav-item col-2 mt-1">Logo</li>
                </ul>
            </nav>
        </header>

</main>


<div class="container cadastro">

    <div class="row no-gutters">
        <div class="col-3 fundo_img">
            <h2>Sua Foto</h2>
        </div>
        <div class="img_upload">
            <input type="file" name="foto">
        </div>

        <div class="col-1"></div>

        <div class="col-5 text-center">
            <h2> Cadastro </h2>
            <form id="frmPost" action="">
                <form method="get" action="envio_dados.php">
                    <input type="text" name="nome" placeholder="Nome Completo">
                    <hr/>
                    <br/>
                    <input type="e-mail" name="email" placeholder="Seu e-mail">
                    <hr/>
                    <br/>
                    <input type="text" name="cpf" maxlength="14" placeholder="CPF"
                           onkeydown="javascript: fMasc( this, mCPF );">
                    <hr/>
                    <br/>
                    <div>
                        <div class="form-group">
                            <input type="text" name="telefone" maxlength="14" placeholder="Telefone"
                                   onkeydown="javascript: fMasc( this, mTel );">
                            <input type="text" name="interfone" placeholder="Interfone">
                            <hr/>
                            <br/>
                        </div>
                        <hr/>
                        <br/>
                        <div>
                            <div class="form-group">
                                <input type="text" name="ap" placeholder="Apto">
                                <input type="text" name="bloco" placeholder="Bloco">
                                <hr/>
                                <br/>
                            </div>
                            <hr/>
                            <br/>
                            <div class="form-group">
                                <input type="text" name="password" placeholder="Senha">
                                <input type="text" name="repeat-password" placeholder="Confirmar Senha">
                                <hr/>
                                <br/>
                            </div>


                        </div>

                        <div>

                            <button type="button" class="btn btn-secondary">Cadastrar</button>
                            <!--
                                                        <input class="btn-secundary" type="submit" name="Cadastrar" value="Cadastrar"> -->
                        </div>

                </form>
        </div>

        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous">
        </script>
        <div class="col-4"></div>
    </div>
</div>


</body>

</html>
