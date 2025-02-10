<x-app>
    <x-slot name="title">Contact</x-slot>

    <main>
        <!-- Contenido de la portada principal -->
        <section class="hero-2">
            <div class="hero-container">
                <header class="hero-content">
                    <h1 class="hero-title">Contáctanos</h1>
                    <p class="hero-subtitle">Datos de contacto de Scarpetoss</p>
                </header>
            </div>
        </section>

        {{-- <div class="content-contact">
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
                            <label for="politica-privacidad-check">Aceptar las <a href="{{route("politica.privacidad")}}">Politicas de Privacidad</a> *</label>
                        </div>
                        <!-- <div class="g-recaptcha" data-sitekey="6LeDlrQpAAAAACDqENvlAuh4ShInnMaezlU_u06O"></div> -->
                        <button class="enviar" type="submit">Enviar Mensaje</button>
                    </form>
                </div>

                
            </div>
        </div> --}}

        <section class="contact-container">
            <div class="contact-content">
                <!-- Formulario de contacto -->
                <article class="contact-form">
                    <h2 class="contact-title">Envíanos un mensaje</h2>
                    <form action="#" method="post" enctype="application/x-www-form-urlencoded" class="form-contact">
                        <label for="name">Nombre y Apellido *
                            <input class="form-input" required type="text" name="name" id="name" placeholder="Tu nombre">
                        </label>

                        <label for="email">Correo Electrónico *
                            <input class="form-input" required type="email" name="email" id="email" placeholder="Tu email">
                        </label>

                        <label for="message">Mensaje *
                            <textarea class="form-textarea" name="message" id="message" cols="30" rows="5" placeholder="Escribe tu mensaje"></textarea>
                        </label>
                        
                        @error('email')
                            <p class="error-message"></p>
                        @enderror
        
                        <div class="privacy-policy-check">
                            <input type="checkbox" name="privacy-policy" id="privacy-policy" required>
                            <label for="privacy-policy">Acepto las <a href="{{ route('politica.privacidad') }}">Políticas de Privacidad</a> *</label>
                        </div>
        
                        <button class="btn-submit" type="submit">Enviar Mensaje</button>
                    </form>
                </article>
        
                <!-- Información de contacto -->
                <aside class="contact-info">
                    <h2 class="contact-title">Nuestros Contactos</h2>
                    <ul class="contact-details">
                        <li>
                            <a href="https://www.google.it/maps/place/83040+Montemarano,+Avellino/" target="_blank">
                                <i class="fa-solid fa-location-dot"></i> Montemarano, AV. Italia
                            </a>
                        </li>
                        <li>
                            <a href="mailto:trabajo.nestor.098@gmail.com">
                                <i class="fa-solid fa-envelope"></i> trabajo.nestor.098@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="tel:+393888683169">
                                <i class="fa fa-whatsapp"></i> +39 388 868 3169
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
        
            <!-- Mapa de ubicación -->
            <div class="contact-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6030.15438358723!2d14.994995248193307!3d40.914053335455385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bd517f75dfe2d%3A0x2f39a5cd52ba3888!2s83040%20Montemarano%2C%20Avellino!5e0!3m2!1ses!2sit!4v1712750018701!5m2!1ses!2sit" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade" 
                    class="map"
                >
                </iframe>
            </div>
        </section>


    </main>


</x-app>