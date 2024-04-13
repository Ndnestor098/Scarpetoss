<?php
    session_name("LOGIN");
    session_start();

    require_once "../php/main.php";

    $data = new Scarpetoss();
    if(isset($_GET["delete"])){
        //Destruye todo las session
        session_destroy();

        //Borra las varibles de session
        session_unset();

        header('Location: /');;
    }

    if(isset($_GET["delete"])){
        //Destruye todo las session
        session_destroy();

        //Borra las varibles de session
        session_unset();
    }

    $data = $data->getUserAll($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />

	<!-- =======================================DESCRIPCION======================================= -->
    <title>Usuario - Scarpetoss</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

	<!-- =======================================INSTAGRAM======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <meta property="og:url" content="http://scarpetoss.infinityfreeapp.com/cliente/index.php">
    <meta property="og:image" content="../image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

	<!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <meta property="twitter:url" content="http://scarpetoss.infinityfreeapp.com/cliente/index.php">
    <meta property="twitter:image" content="../image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="http://scarpetoss.infinityfreeapp.com/cliente/index.php">
    <meta name="robots" content="NOODP,NOYDIR">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://kit.fontawesome.com">
    <script src="https://kit.fontawesome.com/8f34396e62.js" crossorigin="anonymous"></script>

    <!-- =======================================FAVICON======================================= -->
    <link rel="icon" type="image/x-icon" href="../image/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="../image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../image/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <!-- ===========================================MENU=========================================== -->
    <?php require_once "../view/menu.php" ?>

    <!-- ===========================================CONTENIDO=========================================== -->
    <main>
        <!-- Contenido de la portada principal -->
        <div class="Portada-usuario">
            <div class="panel-cuenta">
                <h2>Mi cuenta</h2>
                <div class="opciones">
                    <a href="./" style="width: fit-content;"><div class="celda-opciones">
                        <p>Panel de cuenta</p>
                    </div></a>
                    <a href="./detalles.php" style="width: fit-content;"><div class="celda-opciones">
                        <p>Mis Datos</p>
                    </div></a>
                    <a href="?delete=1" style="width: fit-content;"><div class="celda-opciones">
                        <p>Cerrar sesion</p>
                    </div></a>
                </div>
            </div>
            <div class="info-cuenta">
                <div class="saludo">
                    <h3>Hola, <?php echo $data[1]; ?>!</h3>
                </div>
                <div class="datos">
                    <div>
                        <p>Mis datos</p>
                    </div>
                    <div class="info-data">
                        <div class="info-usuario" >
                            <span><i class="fa-regular fa-user"></i><?php echo $data[1]; ?></span>
                            <span><i class="fa-solid fa-envelope"></i><?php echo $data[2]; ?></span>
                            <span><i class="fa-solid fa-location-dot"></i>Direccion</span>
                        </div>
                        <a href="./detalles.php" style="width: fit-content;"><div class="boton_datos">
                            <span>Mis datos</span>
                        </div></a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "../view/footer.php" ?>

    <script src="../js/style.js"></script>
    <script src="../js/sessionstorage.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>
