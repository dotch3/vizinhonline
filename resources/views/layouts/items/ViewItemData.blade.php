<meta charset="UTF-8"/>
<link href="{{ asset('/css/estilo_formularioItem.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<!-- <div class="container col-md-8"> -->
<!-- Section dos feeds -->
<!-- Aqui vem meu codigo - tem que utilizar bootstrap -->
<section class="container">


    <div class="detalhe-item-maior col-md-11">
        <img src="{{asset('/img/itens/furadeiraView.png')}}" alt="Detalhe Item" title="Detalhe Item"/>
    </div>

    <div class="row">
        <div class="col-md-11">
            <div class="md-form mb-0">
                <!-- <label for="name" class="">Nome</label> -->
                <input type="text" id="name" name="name" value="Furadeira" class="input" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="md-form mb-0">
                <label for="message">Descrição</label>
                <textarea type="text" id="message" name="message" rows="5" class="form-control"
                          disabled>FURADEIRA ELÉTRICA DE IMPACTO 950W. Ferramenta profissional indicada para operações de furação sem impacto em madeira, metal, plástico e cerâmica, e furação com impacto em tijolos, concreto, pedras e alvenarias. Também utilizado para operações de aperto e desaperto de parafusos quando utilizada em baixa velocidade.</textarea>
            </div>
        </div>
    </div>

    <!-- Disponibilidade do item -->
    <div class="row">
        <div class="col-md-2">
            <img src="{{asset('/img/icons/calendar.png')}}" alt="Selecionar data" title="Selecionar data"/>
        </div>
        <div class="col-md-4">
            <label for="disponibilidade">Disponibilidade</label>
        </div>
    </div>
    <!-- Date Picker -->
    <div class="row">
        <div class="col-md-1">
            <label for="meetingInicio">Inicio: </label>
        </div>
        <div class="col-md-4">
            <input id="meetingInicio" type="date" value="2020-05-20"/>
        </div>
        <div class="col-md-1">
            <label for="meetingFim">Fim: </label>
        </div>
        <div class="col-md-4">
            <input id="meetingFim" type="date" value="2020-05-30"/>
        </div>
    </div>
    </form>

</section>
