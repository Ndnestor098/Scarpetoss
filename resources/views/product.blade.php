<x-app>
    <x-slot name="title">{{$product->name}}</x-slot>
    <x-slot name="description">{{$product->description}}</x-slot>
    <x-slot name="image">{{$product->images[0]}}</x-slot>

    <main>
        {{-- Submenu --}}
        <nav class="breadcrumb">
            <ol>
                <li>
                    <a href="{{ route('home') }}">
                        Inicio
                    </a>
                </li>
                <li>
                    <span>></span>
                </li>
                <li>
                    <a href="{{ route("shopping") }}">
                        Shopping
                    </a>
                </li>
                <li>
                    <span>></span>
                </li>
                <li>
                    <a href="{{ route('shopping', [$product->genero => $product->gender]) }}">
                        {{ ucfirst($product->gender) }}
                    </a>
                </li>
            </ol>
        </nav>
    
        {{-- Content --}}
        <section class="product-detail">
            <div class="product-gallery">
                <figure>
                    <img src="{{ $product->images[0] }}" id="main-image" class="main-image" alt="Zapato - {{ $product->name }}">
                </figure>
        
                <div class="image-thumbnails">
                    @foreach ($product->images as $image)
                        <figure>
                            <img class="thumbnail-image" src="{{ $image }}" alt="Imagen adicional {{ $image }}">
                        </figure>
                    @endforeach
                </div>
            </div>
        
            <div class="product-info">
                <article class="product-content">
                    <div class="product-description">
                        <h2>{{ $product->brand }}</h2>
                        <p>{{ $product->name }}</p>
                    </div>
                    
                    <div class="product-price">
                        <span class="price">${{ $product->price }}</span>
                        <p>El precio más bajo en los 30 días anteriores al descuento: <br> ${{$product->price}}</p>
                    </div>
            
                    <div class="cart-button">
                        <form class="add-to-cart-form" id="cart-form" action="{{ route('cart.create') }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                            <label for="sizes" style="display: flex; justify-content: center; align-items: center;">Seleccione una talla:
                                <select 
                                    name="sizes" 
                                    id="sizes" 
                                    required
                                >
                                    <option value="" disabled selected>Seleccionar talla</option>
                                    @foreach ($product->sizes as $item)
                                        <option value="{{ $item->sizes }}">
                                            Talla {{ rtrim(rtrim(number_format($item->sizes, 2), '0'), '.') }}
                                        </option>
                                    @endforeach
                                </select> 
                            </label>
                            
                            <button type="submit">Agregar al carrito</button>
                        </form>
                    </div>
            
                    <div class="delivery-info">
                        <span><i class="fa-solid fa-circle"></i><p>El tiempo estimado de entrega es de 5 a 6 días hábiles</p></span>
                        <span><i class="fa-solid fa-wallet"></i><p>Entrega gratuita a partir de 45 € y devoluciones gratuitas hasta 30 días.</p></span>
                    </div>
                </article>
            </div>
        </section>
        
    
        {{-- Carousel --}}
        <h1 class="title-home">PRODUCTOS</h1>
        <x-carousel :carousel="$carousel"/>

        {{-- Authenticated --}}
        <script>
            window.isAuthenticated = @json(Auth::check());
        </script>
    </main>

    {{-- Script --}}
    <x-slot name="script">
        <script src="/js/slider.js"></script>
        <script src="/js/cart.js"></script>
        <script src="/js/changeProduct.js"></script>
    </x-slot>
</x-app>