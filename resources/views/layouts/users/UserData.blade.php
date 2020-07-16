<head>
    <link href="{{ asset('/css/estilo_userData.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<!-- Obtendo o nome do usuario dinamicamente segundo a pagina -->

<section class="user_data col-12">

    <h2>
        {{ !empty(Auth::check())? Auth::user()->name: '' }}
    </h2>
    {{-- <a href="#">
        <img src="{{!empty($user ?? ''->id) ? asset('/img/avatar/'.$user ?? ''->image->slug): '' }} "
             onclick="redirectToProfile(this.src)" alt=" perfil" ,
             title="perfil" class="perfil"/>
    </a> --}}
    <div class="row">
        <div class="col-8">
            @if(!empty(Auth::user()->image->id))
                {{--                    @elseif(Storage::disk('public')->exists($user->image->name))--}}

                {{-- <img src="{{asset('/storage/avatar/'.$user->image->slug)}}" id="imgProfile" class="profile"
                     style="width: 180px;height: 170px; "> --}}
                <div class="personal-image">
                    <div class="profile-img img_upload">
                        <label class="label">
                            <input type="file" multiple accept='image/*' name="image" id="image" style="width: 200px;">
                            <figure class="personal-figure">
                                <img id="imgProfile" src="{{asset('/storage/avatar/'.Auth::user()->image->slug)}}"
                                     id="imgProfile"
                                     class="personal-avatar" alt="avatar">
                                <figcaption class="personal-figcaption">
                                    <img
                                        src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"
                                        alt="foto">
                                </figcaption>
                            </figure>
                        </label>
                    </div>
                </div>

            @else
                {{-- <div class=" fundo_img">

                    <h2>Sua Foto</h2>
                </div> --}}
                <div class="personal-image">
                    <div class="profile-img img_upload">
                        <label class="label">
                            <input type="file" multiple accept='image/*' name="image" id="image" style="width: 200px;">
                            <figure class="personal-figure">
                                <img id="imgProfile" src="/storage/avatar/fundo.png" class="personal-avatar"
                                     alt="avatar">
                                <figcaption class="personal-figcaption">
                                    <img
                                        src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"
                                        alt="foto">
                                </figcaption>
                            </figure>
                        </label>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="dadosUser">
        <div class="col-12">

            <div class="container">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-user" style="font-size:20px ; color: #000000"></i>
            </span>{{ !empty(Auth::user()->id) ? Auth::user()->name." ".Auth::user()->lastname: '' }}</li>
                    <li><span class="fa-li"><i class="fas fa-envelope"
                                               style="font-size:20px ; color: #000000"></i></span>{{ !empty(Auth::user()->id) ? Auth::user()->email: '' }}
                    </li>
                    <li><span class="fa-li"><i class="fas fa-building"
                                               style="font-size:20px ; color: #000000"></i></span>{{ !empty(Auth::user()->location) ? Auth::user()->location->building." ".Auth::user()->location->apartment_number: 'Não Informado' }}
                    </li>
                    <li><a href="{{ !empty(Auth::user()->id) ? route('posts',Auth::user()->id): '#' }} " style="color:inherit">
                    <span class="fa-li"><i class="fas fa-check-square"
                                           style="font-size:20px ; color: #000000"></i></span>
                            Meus posts {{!empty(Auth::user()->posts)? count(Auth::user()->posts): ''}}
                        </a>
                    </li>
                    <!-- verificar se os itens abaixo serão necessarios, pois invite é muito complicado a programacao e contagem de emprestimo será comprometida se fizer fora da plataforma -->
                    <!-- <li><span class="fa-li"><i class="fas fa-users" style="font-size:20px ; color: #000000"></i></span>3 Vizinhos -->
                    <!-- </li> -->
                    <!-- <li><span class="fa-li"><i class="fas fa-people-carry" style="font-size:20px ; color: #000000"></i></span>3 -->
                    <!-- Emprestimos</li> -->
                    {{--                    <li><span class="fa-li"><i class="fas fa-thumbs-up"--}}
                    {{--                                               style="font-size:20px ; color: #000000"></i></span>Recomendeme--}}
                    {{--                    </li>--}}
                    <li><a href="{{!empty(Auth::user()->id)? route('favorites',Auth::user()->id): '#'}}" style="color:inherit">
                            <span class="fa-li"><i class="fas fa-heart"
                                                   style="font-size:20px ; color: #000000"></i></span>
                            Favoritos {{!empty(Auth::user()->favorites)? count(Auth::user()->favorites): ''}}
                        </a>
                    </li>
                    <li><span class="fa-li"><i class="fas fa-cog"
                                               style="font-size:20px ; color: #000000"></i></span>
                        <a style="color:inherit" href="{{!empty(Auth::user()->id)? route('users.profile',Auth::user()->id) :''}}">
                            Configuração de conta</a>
                    </li>
                    <li><a style="color:inherit" href="{{route('logout')}}"><span class="fa-li"><i
                                    class="fas fas fa-sign-out-alt"
                                    style="font-size:20px ; color: #000000"></i></span>
                            Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
