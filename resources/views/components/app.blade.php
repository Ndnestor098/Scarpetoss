<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />

	<!-- =======================================DESCRIPCION======================================= -->
    <title>Scarpetoss {{ $title }}</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

	<!-- =======================================OPENGRAPH======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <meta property="og:url" content="{{request()->url()}}">
    <meta property="og:image" content="/image/logo.jpeg">
    <meta property="og:updated_time" content="{{now()}}">
    <meta property="og:type" content="website">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="{{request()->url()}}">
    <meta name="robots" content="NOODP,NOYDIR">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://kit.fontawesome.com">
    <script src="https://kit.fontawesome.com/8f34396e62.js" crossorigin="anonymous"></script>

    <!-- =======================================FAVICON======================================= -->
    <link rel="icon" type="image/x-icon" href="/image/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @yield('link')
    {{-- @vite('resources/css/app.css') --}}
</head>
<body  @if(!request()->hasCookie('Remember_cookie')) class="no-scroll" @endif>
    <!-- ===========================================COOKIE=========================================== -->
    @if(!request()->hasCookie('Remember_cookie'))
        <div id="contenedor-cookie">
            <div class="cookie">
                <div class="info-cookie">
                    <span class="title"><i class="fa-solid fa-cookie-bite"></i>Cookies</span>
                    <p>Utilizamos cookies para hacer que nuestro sitio funcione mejor al almacenar información limitada sobre su uso del sitio. <a href="/legalidades/politica-cookie.php">Más información aquí.</a></p>
                    <div>
                        <form action="{{route("cookie")}}" method="POST">
                            @csrf
                            @method('post')
                            <input type="hidden" name="cookie" value="acept">
                            <button type="submit">Solo Necesarias</button>
                        </form>
                        <form action="{{route("cookie")}}" method="POST">
                            @csrf
                            @method('post')
                            <input type="hidden" name="cookie" value="acept">
                            <button type="submit">Todas las Cookies</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- ===========================================MENU=========================================== -->
    <x-navigation></x-navigation>

    {{ $slot }}

    <!-- ===========================================FOOTER=========================================== -->
    <x-footer></x-footer>

    @isset($script)
        {{ $script }}
    @endisset

    <script src="/js/style.js"></script>
</body>
</html>