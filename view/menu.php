<!-- ===========================================MENU=========================================== -->
<header data-temp='<?php echo $_SESSION["session_active"].','.$_SESSION["Name"].','.$_SESSION["ugid"]; ?>'>
    <!--  ------Menu parte 1 / Navegacion de la pagina------  -->
    <div class="primer-menu">
        <div class="area-submenu">
            <i class="fa-solid fa-bars menu-bars" id="menu"></i>
        </div>
        <div class="area-logo">
            <a href="/"><img src="../image/logo1.png" alt="Logo de la pagina"></a>
            <a href="/">Scarpetoss</a>
        </div>
        <div class="area-usuario registrarse">
            <a href="/cart.php"><i class="fa-solid fa-cart-shopping menu-bars activar-user" id="button-menu-shopping" style="display: none;">
                <i id="contador-carrello"></i>
            </i></a>
            <a href="/cliente/"><i class="fa-solid fa-user menu-bars activar-user" id="button-menu-usuario" style="display: none;"></i></a>

            <a href="/view/login.php" id="button-login">Iniciar Sesion</a>
            <a href="/view/register.php" id="button-singup">Registrarse</a>
        </div>
    </div>

    <!--  ------Menu parte 2 / Busquedas rapidas shopping------  -->
    <div class="segundo-menu">
        <ul>
            <li><a href="/shopping.php">Descuentos</a></li>
            <li><a href="/shopping.php?prd=mujer">Damas</a></li>
            <li><a href="/shopping.php?prd=hombre">Caballeros</a></li>
            <li><a href="/shopping.php?prd=niño">Niños</a></li>
            <li><a href="/shopping.php">Moda</a></li>
            <li><a href="/shopping.php">Mas vendidos</a></li>

        </ul>
    </div>
    
    <!--  ------Menu parte 3 / Control de submenu------  -->
    <div class="submenu">
        <i class="menu-bars-x fa-solid fa-xmark" id="button-menu-cerrar"></i>
        <div style="display:flex;flex-direction:column;align-items:center;">
            <i class="fa-solid fa-user menu-bars" id="menu"></i>
            <p class="user_name"></p>
        </div>
        
        <ul id="control">
            <li><a href="/">Inicio</a></li>
            <li><a href="/about.php">Sobre Nosotros</a></li>
            <li><a href="/shopping.php">Shopping</a></li>
            <li><a href="/contacto.php">Contacto</a></li>
        </ul>
        <div class="submenu-legalidades">
            <a href="/legalidad/aviso-legal.php">Aviso Legal</a>
            <a href="/legalidad/politica-privacidad.php">Politica de Privacidad</a>
            <a href="/legalidad/politica-cookie.php">Politica de Cookies</a>
        </div>
    </div>
</header>
