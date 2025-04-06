<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />

	<!-- =======================================DESCRIPCION======================================= -->
    <title>Scarpetoss - {{ $title }}</title>
    @if(isset($description) && isset($image))
        <meta name="description" content="{{ $description }}">
        <meta name="keywords" content=" buy, sell, rent, properties, real estate, dream home">
        <meta name="author" content="Nestor Salom">
        <meta name="robots" content="noindex, nofollow">
    
        <!-- =======================================OPENGRAPH======================================= -->
        <meta property="og:title" content="Scarpetoss - Tu tienda de zapatos">
        <meta property="og:description" content="Descubre los mejores zapatos para cada estilo y momento. Comodidad, calidad y diseño a tu alcance.">
        <meta property="og:image" content="{{ $image }}">
        <meta property="og:image:alt" content="Imagen de nuestros productos de zapatos">
        <meta property="og:url" content="https://scarpetoss.com">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarpetoss">
        <meta property="og:locale" content="es_ES">
    @else
        <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
        <meta name="keywords" content=" buy, sell, rent, properties, real estate, dream home">
        <meta name="author" content="Nestor Salom">
        <meta name="robots" content="noindex, nofollow">
    
        <!-- =======================================OPENGRAPH======================================= -->
        <meta property="og:title" content="Scarpetoss - Tu tienda de zapatos">
        <meta property="og:description" content="Descubre los mejores zapatos para cada estilo y momento. Comodidad, calidad y diseño a tu alcance.">
        <meta property="og:image" content="https://scarpetoss.ndnestor.com/image/portada-home.png">
        <meta property="og:image:alt" content="Imagen de nuestros productos de zapatos">
        <meta property="og:url" content="https://scarpetoss.com">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarpetoss">
        <meta property="og:locale" content="es_ES">    
    @endif

    <!-- Security -->
    <meta name="referrer" content="no-referrer">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="{{request()->url()}}">
    <meta name="robots" content="NOODP,NOYDIR">

    <link rel="stylesheet" href="/css/style.css?v=1.9">
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

    @isset($link)
        {{ $link }}
    @endisset
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

    <div class="info">
        <div class="info__icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m12 1.5c-5.79844 0-10.5 4.70156-10.5 10.5 0 5.7984 4.70156 10.5 10.5 10.5 5.7984 0 10.5-4.7016 10.5-10.5 0-5.79844-4.7016-10.5-10.5-10.5zm.75 15.5625c0 .1031-.0844.1875-.1875.1875h-1.125c-.1031 0-.1875-.0844-.1875-.1875v-6.375c0-.1031.0844-.1875.1875-.1875h1.125c.1031 0 .1875.0844.1875.1875zm-.75-8.0625c-.2944-.00601-.5747-.12718-.7808-.3375-.206-.21032-.3215-.49305-.3215-.7875s.1155-.57718.3215-.7875c.2061-.21032.4864-.33149.7808-.3375.2944.00601.5747.12718.7808.3375.206.21032.3215.49305.3215.7875s-.1155.57718-.3215.7875c-.2061.21032-.4864.33149-.7808.3375z"></path></svg>
        </div>
        <div class="info__title">Se recomienda no realizar compras, ya que esta es una web app de muestra.</div>
    </div>

    <script src="/js/style.js"></script>
</body>
</html>