<?php
    session_name("LOGIN");
    session_start();
    $_POST = json_decode(file_get_contents('php://input'),true);
    require_once "../php/main.php";

    $data = new Scarpetoss();
    

    if(isset($_GET["delete"])){
        //Destruye todo las session
        session_destroy();

        //Borra las varibles de session
        session_unset();

        header('Location: /');;
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
    <meta property="og:url" content="http://scarpetoss.infinityfreeapp.com/cliente/detalles.php">
    <meta property="og:image" content="../image/logo.jpeg">
    <meta property="og:updated_time" content="2024-01-28T10:35:47+00:00">
    <meta property="og:type" content="website">

	<!-- =======================================TWITTER======================================= -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:site_name" content="Scarpetoss">
    <meta property="twitter:description" content="Vendemos zapatos de tu preferencias para que estes comodo y contento con tus elecciones.">
    <meta property="twitter:title" content="Tienda online - Scarpetoss">
    <meta property="twitter:url" content="http://scarpetoss.infinityfreeapp.com/cliente/detalles.php">
    <meta property="twitter:image" content="../image/logo.jpeg">
    <meta property="twitter:updated_time" content="2024-01-28T10:35:47+00:00">

	<!-- =======================================PRECONECCIONES	======================================= -->
    <meta rel="canonical" href="http://scarpetoss.infinityfreeapp.com/cliente/detalles.php">
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
    <link rel="manifest" href="../image/favicon/manifest.json">
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
                    <div class="contenido-data">
                        <div class="info-data">
                            <div>
                                <p>Mis datos</p>
                            </div>
                            <div class="info-usuario" >
                                <form action="../php/user.php?part=1" method="POST" autocomplete="off" enctype="application/x-www-form-urlencoded" class="cambiar-info">
                                    <div>
                                        <label for="customer-name">Nombre</label>
                                        <input type="text" name="customer-name" id="customer-name" placeholder="Nombre" value="<?php echo $data[1]; ?>">
                                    </div>
                                    <div>
                                        <label for="customer-email">Email</label>
                                        <input type="email" name="customer-email" id="customer-email" placeholder="correo electronico" disabled="disabled" value="<?php echo $data[2]; ?>">
                                    </div>
                                    <div>
                                        <label for="customer-key">Clave Actual</label>
                                        <input type="password" name="customer-key" id="customer-key" required placeholder="Clave Actual">
                                    </div>
                                    <span class="error error-name"></span>
                                    <button type="submit">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                        <div class="cambio-key">
                            <div>
                                <p>Cambiar Clave</p>
                            </div>
                            <div class="info-usuario" >
                                <form action="../php/user.php?part=2" method="POST" enctype="application/x-www-form-urlencoded" class="cambiar-clave">
                                    <div>
                                        <label for="customer-key">Clave Actual</label>
                                        <input type="text" name="customer-key" id="customer-key" required placeholder="Clave Actual">
                                    </div>
                                    <div>
                                        <label for="customer-key-new">Clave Nueva</label>
                                        <input type="text" name="customer-key-new" id="customer-key-new" required placeholder="Clave Nueva">
                                    </div>
                                    <span class="error error-clave"></span>
                                    <button type="submit">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <script>
        form(document.querySelector(".cambiar-info"), 'error-name');
        form(document.querySelector(".cambiar-clave"), 'error-clave');

        function form(f, error){
            f.addEventListener("submit",(e)=>{
                e.preventDefault();

                let data = new FormData(f);
                let method = f.getAttribute("method");
                let action = f.getAttribute("action");

                let encabezado = new Headers();

                let config = { 
                    method:method,
                    header:encabezado,
                    mode:"cors",
                    cache:'no-cache',
                    body:data,
                }

                //Se envia y se recibe toda la informacion de cart.php
                fetch(action, config)
                    .then(res => res.text())
                    .then(res => {
                        if(res.length == 0){
                            location.reload();
                        }
                        document.querySelector(`.${error}`).innerHTML = res;
                });
            })
        }

    </script>

    </main>

    <!-- ===========================================FOOTER=========================================== -->
    <?php require_once "../view/footer.php" ?>

    <script src="../js/style.js"></script>
    <script src="../js/sessionstorage.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>
