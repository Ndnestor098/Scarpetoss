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
    <title>Shopping - Scarpetoss</title>
    <meta name="description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    
    <meta name="product_id" content="102856451">
    <meta property="fb:admins" content="100000984792126">
    <meta property="fb:app_id" content="255986568181021">

	<!-- =======================================INSTAGRAM======================================= -->
    <meta property="og:site_name" content="Scarpetoss">
    <meta property="og:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="og:title" content="Tienda online - Scarpetoss">
    <meta property="og:url" content="http://scarpetoss.infinityfreeapp.com/shopping.php">
    <meta property="og:image" content="./image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

	<!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <meta property="twitter:url" content="http://scarpetoss.infinityfreeapp.com/shopping.php">
    <meta property="twitter:image" content="./image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="http://scarpetoss.infinityfreeapp.com/shopping.php">
    <meta name="robots" content="NOODP,NOYDIR">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/slider.css">
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
<body data-temp='<?php if(isset($_GET['prd']) != ''){echo $_GET['prd'];} ?>'>

        
    <!-- ===========================================MENU=========================================== -->
    <?php require_once "./view/menu.php" ?>
    
    <div id="contenedor-cookie">
    </div>
    <script src="./js/cookie.js"></script>
    <!-- ===========================================CONTENIDO=========================================== -->
    <main>
        <!-- Contenido de la pagina principal -->
        <div class="contenido-shopping">
            
            <div class="count-productos">
                <div class="contenido-title-celda">
                    <div class="celda-content">
                        <a href="?prd=hombre"><div class="content-product">
                            <p class="title-content-cell">Hombre</p>
                            <p class="max-content-cell">
                                <?php 
                                require_once "./php/main.php";
                                $data = new Scarpetoss;
                                print_r($data->getProductCount("SELECT COUNT(producto_name) as cuenta FROM productos WHERE producto_genero = 'hombre'"));?>
                            </p>
                        </div></a>
                    </div>
                    <div class="celda-content">
                        <a href="?prd=mujer"><div class="content-product">
                            <p class="title-content-cell">Mujeres</p>
                            <p class="max-content-cell">
                                <?php 
                                print_r($data->getProductCount("SELECT COUNT(producto_name) as cuenta FROM productos WHERE producto_genero = 'mujer'"));?>
                            </p>
                        </div></a>
                    </div>
                    <div class="celda-content">
                        <a href="?prd=niño"><div class="content-product">
                            <p class="title-content-cell">Niños</p>
                            <p class="max-content-cell">
                                <?php 
                                print_r($data->getProductCount("SELECT COUNT(producto_name) as cuenta FROM productos WHERE producto_genero = 'niños'"));?>
                            </p>
                        </div></a>
                    </div>
                    <div class="celda-content">
                        <a href="?prd=unisex"><div class="content-product">
                            <p class="title-content-cell">Unisex</p>
                            <p class="max-content-cell">
                                <?php 
                                print_r($data->getProductCount("SELECT COUNT(producto_name) as cuenta FROM productos WHERE producto_genero = 'unisex'"));?>
                            </p>
                        </div></a>
                    </div>
                </div>
                
            </div>

            <div class="productos">
                <div class="producto-filtro">
                    <div class="producto-opcion">
                        <label for="orden-by">Ordenar por:</label>
                        <select id="orden-by">
                            <option value="0">Recomendados</option>
                            <option value="ASCLetra">Nombre: A - Z</option>
                            <option value="DESCLetra">Nombre: Z - A</option>
                            <option value="ASCPrecio">Precio más bajo</option>
                            <option value="DESCPrecio">Precio más alto</option>
                        </select>
                    </div>

                    <div class="cantidad-producto">
                        <p>Resultado <?php 
                            require_once "./php/main.php";
                            $data = new Scarpetoss;
                            print_r($data->getProductCount("SELECT COUNT(producto_name) as cuenta FROM productos"));
                        ?></p>
                    </div>
                    <div class="div-buscar" onclick='buscar(document.querySelector("#orden-by").value)'>
                        <p>Buscar</p>
                    </div>
                </div>


                <div class="catalogo">
                    <div class="contenido-catalogo">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "./view/footer.php" ?>

    <script src="./js/style.js"></script>
    <!-- <script src="./js/slider.js"></script> -->
    <script src="./js/sessionstorage.js"></script>
    <script src="./js/cart.js"></script>
    <script src="./js/catalogo.js"></script>

</body>
</html>
