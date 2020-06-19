<meta charset="UTF-8"/>
<link href="{{ asset('/css/estilo_formularioItem.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- <div class="container col-md-8"> -->
<!-- Section dos feeds -->
<!-- Aqui vem meu codigo - tem que utilizar bootstrap -->
<section class="container">

    <form>
        <div class="detalhe-item-maior col-md-10">
            <img src="img/itens/furadeiraView.png" alt="Detalhe Item" title="Detalhe Item"/>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="md-form mb-0">
                    <label for="name" class="">Nome</label>
                    <input type="text" id="name" name="name" value="Furadeira" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="md-form mb-0">
                    <label for="message">Descrição</label>
                    <input type="textarea" id="message" name="message" rows="5" class="form-control md-textarea"
                           placeholder="Olá vizinho!<br>Tenho interesse nesse objeto!">
                </div>
            </div>
        </div>

    </form>

</section>
