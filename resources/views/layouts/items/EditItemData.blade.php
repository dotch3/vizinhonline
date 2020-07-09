<meta charset="UTF-8"/>
<link href="{{asset('/css/estilo_formularioItem.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!-- <div class="container col-md-8"> -->
<!-- Section dos feeds -->
<!-- Aqui vem meu codigo - tem que utilizar bootstrap -->
<section class="div_detalhe_items">
    <div class="container">
        <div class="col-md-10">
            <form action="PHP/file.php" method="POST" enctype="multipart/form-data">
                <div class="container row">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"/>
                            <label for="imageUpload"></label>

                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url({{asset('/img/itens/add.png')}});">
                            </div>
                        </div>
                    </div>
                    <div id="trash_div">
                        <a href="#">
                            <img src="img/icons/trash.png" alt="Descartar imagem" title="Descartar imagem"/>
                        </a>
                    </div>
                </div>
        </div>

        <!-- Inserir java script para atualizar imagem da tela -->
        <script src="../js/rendered-js.js"></script>
        <div class="row">
            <!--Grid column-->
            <div class="col-md-2">
                <!-- <label for="name" class="">Nome</label> -->
                <input type="text" id="name" name="name" class="input" placeholder="Nome">
            </div>
        </div>
        <br>
        <div class="row">
            <!--Grid column-->
            <div class="col-md-10">
                <div class="md-form mb-0">
                    <!-- <label for="message">Descrição</label> -->
                    <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"
                              placeholder="Descrição"></textarea>
                </div>
            </div>
        </div>
        <br>
        <!-- Disponibilidade do item -->

        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <img src="img/icons/calendar.png" alt="Selecionar data" title="Selecionar data"/>
                </div>
                <div class="col-md-3">
                    <label for="disponibilidade">Disponibilidade</label>
                </div>
            </div>
            <!-- Date Picker -->
            <div class="row">
                <div class="col-md-2">
                    <label for="meetingInicio">Inicio: </label>
                </div>
                <div class="col-md-3">
                    <input id="meetingInicio" type="date" value="2020-05-20"/>
                </div>
                <div class="col-md-2">
                    <label for="meetingFim">Fim: </label>
                </div>
                <div class="col-md-3">
                    <input id="meetingFim" type="date" value="2020-05-30"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 mb-6; text-right text-md-right">
                    <br><a button type="button" class="btn btn-outline-secondary btn-lg">Cadastar</a>
                </div>
            </div>

            </form>
        </div>
    </div>
</section>
