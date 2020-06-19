<div class="container">
    <div class="row">
        <div class="col-6">
            <article class="article_items"><a><img src="img/itens/furadeira.png" alt="item" title="item"/></a>
                <!-- <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">Detalhes do Item</button>        -->
                @include('.layouts/items/ModelItem')
            </article>
        </div>
        <div class="col-6">
            <article class="article_items"><a><img src="img/itens/muffin.png" alt="item" title="item"/></a>
                @include('.layouts/items/ModelItem')
            </article>
        </div>
    </div>
    <div class="row">
        <!-- linha vazia -->
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <article class="article_items"><a><img src={{asset('/img/itens/pesca.png')}}  alt="item" title="item"/></a>
                @include('.layouts/items/ModelItem')
            </article>
        </div>
        <div class="col-6">
            <article class="article_items"><a><img src={{asset('/img/itens/mergulho.png')}}  alt="item"
                                                   title="item"/></a>
                @include('.layouts/items/ModelItem')
            </article>
        </div>
    </div>
    <div class="row">
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <article class="article_items"><a><img src={{asset('/img/itens/guardasol.png')}}  alt="item" title="item"/></a>
            @include('.layouts/items/ModelItem')
        </div>
        <div class="col-6">
            <article class="article_items"><a><img src={{asset('/img/itens/mala.png')}}  alt="item" title="item"/></a>
            @include('.layouts/items/ModelItem')
        </div>
    </div>
    <div class="row">
    </div>
</div>
