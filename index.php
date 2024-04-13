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
    <title>Scarpetoss</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

	<!-- =======================================INSTAGRAM======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <meta property="og:url" content="http://scarpetoss.infinityfreeapp.com/">
    <meta property="og:image" content="./image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

	<!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <meta property="twitter:url" content="http://scarpetoss.infinityfreeapp.com/">
    <meta property="twitter:image" content="./image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="http://scarpetoss.infinityfreeapp.com/">
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
        <div class="Portada-home">
            <div class="contenedor-portada">
                <div class="title-portada">
                    <p>SHOES FOR YOU</p>
                    <p class="super-title">URBAN COLLECTION</p>
                    <p class="promo-title">Compra hasta con un 40% de descuento</p>
                </div>
                <div class="boton-portada">
                    <a href="/shopping.php">SHOP DAY</a>
                </div>
            </div>
            <div class="contenedor-portada"></div>
        </div>

        <!-- Contenido de productos -->
        <p class="title-home">PRODUCTOS</p>
        <?php require_once "./php/slider.php"  ?>

        <!-- Contenido de Publidad -->
        <div class="banner-publicidad">
            <div class="contenedor-global-publicidad">
                <div class="banner-1">
                    <p class="title-banner-1">ESCOJA ENTRE</p>
                    <P class="info-banner-1">CLÁSICOS ROBUSTOS Y LIMPIOS</P>
                    <div style="margin-top: 10px; height: 53px;">
                        <a href="/shopping.php"class="button-banner">COMPRAR AHORA</a>
                    </div>
                </div>
                <div class="banner-2">
                    <p class="title-banner-2">MODELOS MÁS NOTABLES</p>
                    <div style="margin-top: 10px; height: 53px;">
                        <a href="/shopping.php"class="button-banner">COMPRAR AHORA</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contenido de productos destacados -->
        <p class="title-home">PRODUCTOS DESTACADOS</p>
        <div class="carrusel-2">
            <div class="carrusel-content-2">
                <a href="/producto.php?scarpe=Adidas Running Alphabounce Beyond"><div class="producto-carrusel-2">
                    <div class="image-producto">
                        <img src="./image/imgProduct/adidas-running-alphabounce-beyond-P.webp" alt="">
                    </div>

                    <div class="informacion-producto">
                        <div class="title-producto">Adidas Running Alphabounce Beyond</div>
                        <div class="precio-producto">$19.00</div>
                        <button onclick="contar(2)">Añadir al Carrito</button>
                    </div>
                </div></a>
                <a href="/producto.php?scarpe=Converse Chuck Taylor All Star Leather Hi"><div class="producto-carrusel-2">
                    <div class="image-producto">
                        <img src="./image/imgProduct/converse_chuck_taylor_all_star_leather_hi-P.webp" alt="">
                    </div>

                    <div class="informacion-producto">
                        <div class="title-producto">Converse Chuck Taylor All Star Leather Hi</div>
                        <div class="precio-producto">$22.00</div>
                        <button onclick="contar(3)">Añadir al Carrito</button>
                    </div>
                </div></a>
                <a href="/producto.php?scarpe=New Balance Fuelcore Nergize"><div class="producto-carrusel-2">
                    <div class="image-producto">
                        <img src="./image/imgProduct/new_balance_fuelcore_nergize-P.webp" alt="">
                    </div>

                    <div class="informacion-producto">
                        <div class="title-producto">New Balance Fuelcore Nergize</div>
                        <div class="precio-producto">$20.00</div>
                        <button onclick="contar(4)">Añadir al Carrito</button>
                    </div>
                </div></a>
                <a href="/producto.php?scarpe=Adidas Pharrell Williams Tenis Humano"><div class="producto-carrusel-2">
                    <div class="image-producto">
                        <img src="./image/imgProduct/adidas_originals_pharrell_williams_tennis_human_race-P.webp" alt="">
                    </div>

                    <div class="informacion-producto">
                        <div class="title-producto">Adidas Originals Pharrell Williams Tennis Human...</div>
                        <div class="precio-producto">$110.00</div>
                        <button onclick="contar(5)">Añadir al Carrito</button>
                    </div>
                </div></a>
            </div>
        </div>

        <!-- Contenido de productos destacados -->
        <div class="marcas">
            <div class="content-marcas">
                <div style="background-image: url(./image/adidas.avif);"></div>
                <div style="background-image: url(./image/boxfresh.avif);"></div>
                <div style="background-image: url(./image/converse.avif);"></div>
                <div style="background-image: url(./image/jimmy_choo.webp);"></div>
                <div style="background-image: url(./image/lacoste.webp);"></div>
                <div style="background-image: url(./image/New-Balance.webp);"></div>
            </div>
        </div>
    </main>


    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "./view/footer.php" ?>

    <script src="./js/style.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/sessionstorage.js"></script>
    <script src="./js/cart.js"></script>
</body>
</html>
