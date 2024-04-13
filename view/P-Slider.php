<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />

    <!-- =======================================DESCRIPCION======================================= -->
    <title>Scarpetoss</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

    <!-- =======================================INSTAGRAM======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <!-- <meta property="og:url" content="https://ndsmart.000webhostapp.com/"> -->
    <meta property="og:image" content="./image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

    <!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <!-- <meta property="twitter:url" content="https://ndsmart.000webhostapp.com//"> -->
    <meta property="twitter:image" content="./image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

    <!-- =======================================PRECONECCIONES	======================================= -->
    <!-- <meta rel="canonical" href="https://ndsmart.000webhostapp.com/"> -->
    <meta name="robots" content="NOODP,NOYDIR">
    <link rel="stylesheet" href="./css/bulma-no-dark-mode.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://kit.fontawesome.com">
    <script src="https://kit.fontawesome.com/8f34396e62.js" crossorigin="anonymous"></script>

    <!-- =======================================FAVICON======================================= -->
    <link rel="icon" type="image/x-icon" href="./image/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="./image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./image/favicon/favicon-16x16.png">
    <link rel="manifest" href="./image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <!-- ===========================================MENU=========================================== -->
    <header>
        <!--  ------Menu parte 1 / Navegacion de la pagina------  -->
        <div class="primer-menu">
            <div class="area-submenu">
                <i class="fa-solid fa-bars menu-bars" id="menu"></i>
            </div>
            <div class="area-logo">
                <a href="/"><img src="./image/logo1.png" alt="Logo de la pagina"></a>
                <a href="/">Scarpetoss</a>
            </div>
            <div class="area-usuario registrarse">
                <i class="fa-solid fa-cart-shopping menu-bars" id="button-menu-shopping" style="display: none;">
                    <i id="contador-carrello"></i>
                </i>
                <i class="fa-solid fa-user menu-bars" id="button-menu-usuario" style="display: none;"></i>

                <a href="./view/login.php">Iniciar Sesion</a>
                <a href="./view/register.php">Registrarse</a>
            </div>
            <!-- <div class="area-usuario" style="display: none;">
                <i class="fa-solid fa-cart-shopping menu-bars" id="button-menu-shopping" style="display: none;"></i>
                <i class="fa-solid fa-user menu-bars" id="button-menu-usuario" style="display: none;"></i>
            </div> -->
        </div>

        <!--  ------Menu parte 2 / Busquedas rapidas shopping------  -->
        <div class="segundo-menu">
            <ul>
                <li><a href="#">Descuentos</a></li>
                <li><a href="#">Damas</a></li>
                <li><a href="#">Caballeros</a></li>
                <li><a href="#">Niños</a></li>
                <li><a href="#">Moda</a></li>
                <li><a href="#">Mas vendidos</a></li>

            </ul>
        </div>
        
        <!--  ------Menu parte 3 / Control de submenu------  -->
        <div class="submenu">
            <i class="menu-bars-x fa-solid fa-xmark" id="button-menu-cerrar"></i>
            <i class="fa-solid fa-user menu-bars" id="menu"></i>
            <ul id="control">
                <li><a href="/">Inicio</a></li>
                <li><a href="#">Sobre Nosotros</a></li>
                <li><a href="#">Shopping</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <div class="submenu-legalidades">
                <a href="#">Aviso Legal</a>
                <a href="#">Politica de Privacidad</a>
                <a href="#">Politica de Cookies</a>
            </div>
        </div>
    </header>
    <div style="height: 300px;"></div>

    <?php
        include ("./php/main.php");

        $paginado = new Scarpetoss();

        echo $paginado->pageTable(5, 8, "?prueba&page=", 3);
    ?>
</nav>
</body>
</html>