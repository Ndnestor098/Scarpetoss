@extends('layouts.template')

@section('name-page')
    Home
@endsection

@section('content-page')
    <main>
        <!-- Contenido de la portada principal -->
        <section class="hero" style="background-image: url(../image/portada-home.png);">
            <div class="hero-container">
                <div class="hero-content">
                    <h2>SHOES FOR YOU</h2>
                    <h1 class="hero-title">URBAN COLLECTION</h1>
                    <p class="hero-subtitle">Compra hasta con un 40% de descuento</p>
                </div>
                
                <div class="hero-button">
                    <a href="{{route('shopping')}}">SHOP DAY</a>
                </div>
            </div>
        </section>

        <!-- Contenido de productos -->
        <section>
            <h2 class="title-home">PRODUCTOS</h2>

            @include('components.carousel')
        </section>

        <!-- Publicidad -->
        <section class="ad-banner">
            <div class="ad-banner-wrapper">
                <article class="ad-banner-classic">
                    <header>
                        <h2 class="ad-banner-title">Choose Between</h2>
                        <p class="ad-banner-description">Classic, robust, and clean styles</p>
                    </header>

                    <div class="ad-banner-button-wrapper">
                        <a href="{{route('shopping')}}" class="ad-banner-button">Shop Now</a>
                    </div>
                </article>

                <article class="ad-banner-featured">
                    <header>
                        <h2 class="ad-banner-title">Most Notable Models</h2>
                    </header>
                    <div class="ad-banner-button-wrapper">
                        <a href="{{route('shopping')}}" class="ad-banner-button">Shop Now</a>
                    </div>
                </article>
            </div>
        </section>
        
        <!-- Sección de marcas destacadas -->
        <section class="brands">
            <ul class="brands-list">
                <li class="brand-item">
                    <figure>
                        <img src="/image/adidas.avif" alt="Adidas Logo">
                    </figure>
                </li>
                <li class="brand-item">
                    <figure>
                        <img src="/image/boxfresh.avif" alt="Boxfresh Logo">
                    </figure>
                </li>
                <li class="brand-item">
                    <figure>
                        <img src="/image/converse.avif" alt="Converse Logo">
                    </figure>
                </li>
                <li class="brand-item">
                    <figure>
                        <img src="/image/jimmy_choo.webp" alt="Jimmy Choo Logo">
                    </figure>
                </li>
                <li class="brand-item">
                    <figure>
                        <img src="/image/lacoste.webp" alt="Lacoste Logo">
                    </figure>
                </li>
                <li class="brand-item">
                    <figure>
                        <img src="/image/New-Balance.webp" alt="New Balance Logo">
                    </figure>
                </li>
            </ul>
        </section>
    </main>
@endsection


@section('files-js')
    <script src="/js/style.js"></script>
    <script src="/js/slider.js"></script>
@endsection