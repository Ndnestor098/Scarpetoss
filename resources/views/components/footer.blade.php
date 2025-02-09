<footer>
    <section class="footer-content">
        <address class="footer-info">
            <a href="{{ route('home') }}">
                <img src="/image/logo1.png" alt="Logo del footer">
            </a>
            
            <a href="{{ route('home') }}" class="footer-brand">
                Scarpetoss
            </a>
            
            <div>
                <a href="">
                    <i class="fa-solid fa-location-dot"></i>
                    Montemarano, Av. Italia
                </a>
                <a href="mailto:trabajo.nestor@gmail.com">
                    <i class="fa-solid fa-envelope"></i> 
                    trabajo.nestor@gmail.com
                </a>
                <a href="tel:+393888683169">
                    <i class="fa-solid fa-phone"></i> 
                    +39 388 868 3169
                </a>
            </div>
        </address>

        <nav class="footer-nav">
            <h2 class="footer-title">Productos</h2>
            <ul>
                <li><a href="{{ route('shopping') }}">Descuentos</a></li>
                <li><a href="{{ route('shopping', ['genero' => 'mujer']) }}">Damas</a></li>
                <li><a href="{{ route('shopping', ['genero' => 'hombre']) }}">Caballeros</a></li>
                <li><a href="{{ route('shopping', ['genero' => 'niño']) }}">Niños</a></li>
                <li><a href="{{ route('shopping') }}">Moda</a></li>
                <li><a href="{{ route('shopping') }}">Más vendidos</a></li>
            </ul>
        </nav>

        <nav class="footer-nav">
            <h2 class="footer-title">Enlaces Legales</h2>
            <ul>
                <li><a href="{{ route('aviso.legal') }}">Aviso Legal</a></li>
                <li><a href="{{ route('politica.privacidad') }}">Política de Privacidad</a></li>
                <li><a href="{{ route('politica.cookie') }}">Política de Cookies</a></li>
            </ul>
        </nav>
    </section>

    <section class="footer-bottom">
        <small>© 2024 <b>Scarpetoss</b> - Todos los derechos reservados</small>
    </section>
</footer>
