@auth
    @php
        $cart = DB::table('carts')->where("user_id", auth()->user()->id)->count();
    @endphp
@endauth

<header class="header">
    <!--  ------Menu parte 1 / Navegacion de la pagina------  -->
    <div class="navigation">
        <div class="submenu-toggle">
            <button class="menu-toggle-button" id="menu" aria-label="Abrir menú principal">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="logo-area">
            <a href="{{route("home")}}" aria-label="Ir a la página principal">
                <img src="/image/logo1.png" alt="Logo de la página">
            </a>
            <a href="{{route("home")}}" aria-label="Ir a la página principal">Scarpetoss</a>
        </div>

        <div class="user-area register-area">
            @auth
                <a href="{{route("cart")}}" aria-label="Ir al carrito de compras">
                    <i id="add-cart" class="fa-solid fa-cart-shopping menu-icon menu-toggle-button user-icon" id="button-menu-shopping">
                        @if($cart != 0)
                            <span id="counter-cart">{{ $cart }}</span>
                        @endif
                    </i>
                </a>
                <a href="{{route("client")}}" aria-label="Ir al perfil de usuario">
                    <i class="fa-solid fa-user menu-icon menu-toggle-button user-icon" id="button-menu-usuario"></i>
                </a>
            @endauth
    
            @guest
                <a href="{{route("login")}}" id="button-login" aria-label="Iniciar sesión">Iniciar Sesión</a>
                <a href="{{route("register")}}" id="button-signup" aria-label="Registrarse">Registrarse</a>
            @endguest
        </div>
    </div>

    <!--  ------Menu parte 2 / Busquedas rapidas shopping------  -->
    <nav class="shopping-menu">
        <ul>
            <li><a href="{{route("shopping")}}" aria-label="Ver descuentos">Descuentos</a></li>
            <li><a href="{{route("shopping", ['gender'=>'mujer'])}}" aria-label="Ver productos para damas">Damas</a></li>
            <li><a href="{{route("shopping", ['gender'=>'hombre'])}}" aria-label="Ver productos para caballeros">Caballeros</a></li>
            <li><a href="{{route("shopping", ['gender'=>'niño'])}}" aria-label="Ver productos para niños">Niños</a></li>
            <li><a href="{{route("shopping", ['trendingProducts'=>'true'])}}" aria-label="Ver productos de moda">Moda</a></li>
            <li><a href="{{route("shopping", ['bestSellers'=>'true'])}}" aria-label="Ver los más vendidos">Más vendidos</a></li>
        </ul>
    </nav>


    <!--  ------Menu parte 3 / Control de submenu------  -->
    <aside class="submenu">
        <button class="close-submenu-button fa-solid fa-xmark" id="close-submenu-button" aria-label="Cerrar el menú"></button>

        <div class="user-info">
            <i class="fa-solid fa-user user-icon" id="menu"></i>
            <p class="user-name">
                @auth
                    {{Auth::user()->name}}
                @endauth
            </p>
        </div>
        
        <nav class="submenu-links">
            <ul>
                <li><a href="{{route("home")}}" aria-label="Ir a inicio">Inicio</a></li>
                <li><a href="{{route("about")}}" aria-label="Ver sobre nosotros">Sobre Nosotros</a></li>
                <li><a href="{{route("shopping")}}" aria-label="Ver productos">Shopping</a></li>
                <li><a href="{{route("contact")}}" aria-label="Contactar con nosotros">Contacto</a></li>
            </ul>
        </nav>
    
        <div class="submenu-legal">
            <a href="{{route("aviso.legal")}}" aria-label="Leer aviso legal">Aviso Legal</a>
            <a href="{{route("politica.privacidad")}}" aria-label="Leer política de privacidad">Política de Privacidad</a>
            <a href="{{route("politica.cookie")}}" aria-label="Leer política de cookies">Política de Cookies</a>
        </div>
    </aside>
</header>
