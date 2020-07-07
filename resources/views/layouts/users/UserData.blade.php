<!-- Esta pagina vai utilizar direito o estilo CSS "user_data" quie se encontra no CSS principal. estilo_feed_include.css
Asi funciona como exemplo de ter todos os estilos em um solo arquivo CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link href="{{ asset('/css/estilo_userData.css') }}" rel="stylesheet">
<script src="../js/rendered-js.js"></script>
<!-- Obtendo o nome do usuario dinamicamente segundo a pagina -->

<section class="user_data">

    <h2>
        {{ !empty($user->id) ? $user->name: '' }}
    </h2>
    @if(!empty($user->id))
        <a href="#">
            <img src="{{!empty($user->image->slug) ? asset('/img/avatar/'.$user->image->slug): '' }} "
                 onclick="redirectToProfile(this.src)" alt=" perfil" ,
                 title="perfil" class="perfil"/>
        </a>

        <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-user" style="font-size:20px ; color: #000000"></i>
            </span>{{ !empty($user->id) ? $user->name." ".$user->lastname: '' }}</li>
            <li><span class="fa-li"><i class="fas fa-envelope"
                                       style="font-size:20px ; color: #000000"></i></span>{{ !empty($user->id) ? $user->email: '' }}
            </li>
            <li><span class="fa-li"><i class="fas fa-building"
                                       style="font-size:20px ; color: #000000"></i></span>{{ !empty($user->location) ? $user->location->building." ".$user->location->apartment_number: 'Não Informado' }}
            </li>
            <li><a href="{{ !empty($user->id) ? route('posts',$user->id): '#' }} " style=" color: #000000">
                    <span class="fa-li"><i class="fas fa-check-square"
                                           style="font-size:20px ; color: #000000"></i></span>
                Meus posts
                </a>
            </li>
            <!-- verificar se os itens abaixo serão necessarios, pois invite é muito complicado a programacao e contagem de emprestimo será comprometida se fizer fora da plataforma -->
            <!-- <li><span class="fa-li"><i class="fas fa-users" style="font-size:20px ; color: #000000"></i></span>3 Vizinhos -->
            <!-- </li> -->
            <!-- <li><span class="fa-li"><i class="fas fa-people-carry" style="font-size:20px ; color: #000000"></i></span>3 -->
            <!-- Emprestimos</li> -->
            <li><span class="fa-li"><i class="fas fa-thumbs-up" style="font-size:20px ; color: #000000"></i></span>Recomendeme
            </li>
            <li><span class="fa-li"><i class="fas fa-heart" style="font-size:20px ; color: #000000"></i></span>0
                Recomendações
            </li>
        </ul>

        <div class="container">
            <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-cog" style="font-size:20px ; color: #000000"></i></span>
                    <a style="color:inherit" href="{{!empty($user->id)? route('users.profile',$user->id) :''}}">
                        Configuração de conta</a>
                </li>
                <li><a style="color:inherit" href="/"><span class="fa-li"><i class="fas fas fa-sign-out-alt"
                                                                             style="font-size:20px ; color: #000000"></i></span>
                        Sair</a></li>

            </ul>
        </div>
    @else
        <div class=" fundo_img">
            <h2>Usuario invalido</h2>
        </div>
    @endif


</section>
