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
    <title>Contacto - Scarpetoss</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

	<!-- =======================================INSTAGRAM======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <meta property="og:url" content="http://scarpetoss.infinityfreeapp.com/contacto.php">
    <meta property="og:image" content="./image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

	<!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <meta property="twitter:url" content="http://scarpetoss.infinityfreeapp.com/contacto.php">
    <meta property="twitter:image" content="./image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="http://scarpetoss.infinityfreeapp.com/contacto.php">
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
        <div class="Portada-contacto">
            <div class="contenedor-portada">
                <div class="title-portada">
                    <p class="super-title">Contactanos</p>
                    <p class="promo-title">Datos de contactos de Scarpetoss</p>
                </div>
            </div>
            <div class="contenedor-portada"></div>
        </div>

        <div class="content-contact">
                <div class="contactar">
                    <!-- ------------Formulario------------ -->
                    <div class="area-contacto">
                        <form action="./php/correo.php" method="post" enctype="application/x-www-form-urlencoded" class='FORMULARIOS'>
                            <h2 style="color: #435334;">Contactanos</h2>
                            <input class="input-info" required type="text" name="name" id="name" placeholder="Nombre y Apellido *">
                            <input class="input-info" required type="email" name="email" id="email" placeholder="Email *">
                            <textarea class="input-mensaje" name="message" id="message" cols="30" rows="10" placeholder="Mensaje *"></textarea>
                            <p class="error"></p>
                            <div style="flex-direction: row;" class="politica-privacidad">
                                <input type="checkbox" name="politica-privacidad-check" id="politica-privacidad-check" style="padding: 0px 0px; box-shadow: none;" required>
                                <label for="politica-privacidad-check">Aceptar las <a href="/legalidad/politica-privacidad.php">Politicas de Privacidad</a> *</label>
                            </div>
                            <!-- <div class="g-recaptcha" data-sitekey="6LeDlrQpAAAAACDqENvlAuh4ShInnMaezlU_u06O"></div> -->
                            <button class="enviar" type="submit">Enviar Mensaje</button>
                        </form>
                    </div>

                    <!-- ------------Contactos------------ -->
                    <div class="area-informacion">
                        <h2>Nuestros Contactos</h2>
                        <div>
                            <a href="https://www.google.it/maps/place/83040+Montemarano,+Avellino/@40.9140533,14.9949952,16z/data=!3m1!4b1!4m6!3m5!1s0x133bd517f75dfe2d:0x2f39a5cd52ba3888!8m2!3d40.9166773!4d14.9970205!16zL20vMGZmeGNw?entry=ttu"><i class="fa-solid fa-location-dot"></i>Montemarano, AV. Italia.</a>
                            <a href="mailto:trabajo.nestor.098@gmail.com"><i class="fa-solid fa-envelope"></i>trabajo.nestor.098@gmail.com</a>
                            <a href="tel:+393888683169"><i class="fa fa-whatsapp"></i>+39 388 868 3169</a>
                        </div>
                    </div>
                </div>

                <!-- ------------Mapa------------ -->
                <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6030.15438358723!2d14.994995248193307!3d40.914053335455385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bd517f75dfe2d%3A0x2f39a5cd52ba3888!2s83040%20Montemarano%2C%20Avellino!5e0!3m2!1ses!2sit!4v1712750018701!5m2!1ses!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mapa"></iframe>
                </div>
        </div>
    </main>

    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "./view/footer.php" ?>

    <script src="./js/style.js"></script>
    <script src="./js/ajax.js"></script>
    <script src="./js/sessionstorage.js"></script>
    <script src="./js/cart.js"></script>
</body>
</html>
