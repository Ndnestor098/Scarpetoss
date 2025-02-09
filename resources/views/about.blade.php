<x-app>
    <x-slot name="title">About</x-slot>

    <main>
        <!-- Contenido de la portada principal -->
        <section class="about-hero">
            <div class="hero-container">
                <header class="hero-content">
                    <h1 class="hero-title">Sobre Nosotros</h1>
                    <p class="hero-subtitle">Conócenos y camina con nosotros.</p>
                </header>
            </div>
        </section>

        <section class="about-content">
            <article class="about-info">
                <h2>¿Quiénes somos?</h2>
                <p>Hemos pasado de ser pioneros en el comercio electrónico a convertirnos en una plataforma online líder en Europa para la moda y el estilo de vida.</p>
            </article>
        
            <article class="about-company">
                <figure>
                    <div class="company-image" style="background-image: url(/image/img-about.jpg);"></div>
                </figure>
                <div class="company-details">
                    <p>Compañía</p>
                    <h2>Scarpetoss</h2>
                    <p class="company-description">Fundada en 2024 en Montemarano, Scarpetoss es hoy una plataforma online líder en Europa para la moda y el estilo de vida.</p>
                </div>
            </article>
        </section>
        
        <section class="about-contact">
            <div class="contact-banner">
                <p>¿Le gustaría poder conocer más de nosotros? Contáctenos.</p>
                <a href="{{ route('contact') }}" class="contact-button">CONTACTAR</a>
            </div>
        </section>

    </main>
</x-app>