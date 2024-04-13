<?php
    session_name("LOGIN");
    session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />

	<!-- =======================================DESCRIPCION======================================= -->
    <title>About - Scarpetoss</title>
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
    <?php require_once "./view/menu.php" ?>

    <!-- ===========================================CONTENIDO=========================================== -->
    <main>
        <div id="contenedor-cookie">
        </div>
        <script src="./js/cookie.js"></script>
        
        <!-- Contenido de la portada principal -->
        <div class="Portada-about">
            <div class="contenedor-portada">
                <div class="title-portada">
                    <p class="super-title">Sobre Nosotros</p>
                    <p class="promo-title">Conocenos y camina con nosotros.</p>
                </div>
            </div>
            <div class="contenedor-portada"></div>
        </div>

        <div class="contenido-about">
            <div class="info-about">
                <h2>¿Quiénes somos?</h2>
                <p>Hemos pasado de ser pioneros en el comercio electrónico a convertirnos en una plataforma online líder en Europa para la moda y el estilo de vida.</p>
            </div>
            <div class="area-img">
                <div class="img"></div>
                <div class="info">
                    <p>Compañía</p>
                    <h2>Scarpetoss</h2>
                    <p class="info-scarpetoss">Fundada en 2024 en Montemarano, Scarpetoss es hoy una plataforma online líder en Europa para la moda y el estilo de vida.</p>
                </div>
            </div>
            
        </div>
        
        <div class="pies-about">
            <div class="pies-img">
                <p>¿Le gustaría poder conocer mas de nosotros? Contactenos.</p>
                <a href="/contacto.php">CONTACTAR</a>
            </div>
        </div>
    </main>

    <!-- <div style="height: 100vh; width: 100%;">
        <button onclick="contar()" style="margin: 300px auto;">Añade al carro</button>
    </div> -->
    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "./view/footer.php" ?>

    <script src="./js/style.js"></script>
    <script src="./js/sessionstorage.js"></script>
    <script src="./js/cart.js"></script>
</body>
</html>
