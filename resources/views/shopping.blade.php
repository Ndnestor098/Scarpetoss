<x-app>
    <x-slot name="title">Shopping</x-slot>
    <x-slot name="link">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>

    <main>
        <!-- Content -->
        <section class="shopping-overview">
            
            {{-- Product Info --}}
            <aside class="product-counter">
                <div class="counter-grid">
                    <a href="{{ request()->fullUrlWithQuery(['gender' => 'hombre']) }}" class="counter-item">
                        <p class="category-title">Hombre</p>
                        <p class="category-total">{{$totals->hombre}}</p>
                    </a>
    
                    <a href="{{ request()->fullUrlWithQuery(['gender' => 'mujer']) }}" class="counter-item">
                        <p class="category-title">Mujer</p>
                        <p class="category-total">{{$totals->mujer}}</p>
                    </a>
    
                    <a href="{{ request()->fullUrlWithQuery(['gender' => 'niño']) }}" class="counter-item">
                        <p class="category-title">Niños</p>
                        <p class="category-total">{{$totals->niño}}</p>
                    </a>
    
                    <a href="{{ request()->fullUrlWithQuery(['gender' => 'unisex']) }}" class="counter-item">
                        <p class="category-title">Unisex</p>
                        <p class="category-total">{{$totals->unisex}}</p>
                    </a>
                </div>
            </aside>

            {{-- Product Content --}}
            <section class="product-listing">
                <header>    
                    <form class="product-filter" action="" method="POST">
                        @if (!request()->has('moda') && !request()->has('msv'))
                            @csrf
                            @method('post')
        
                            <div class="filter-options">
                                <label for="order-by">Ordenar por:</label>
                                <select name="order-by" id="order-by" class="cursor-pointer">
                                    <option value="" selected disabled>Buscar Por:</option>
                                    <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'name_asc']) }}" 
                                        @if(request()->get("orderBy") == 'name_asc') selected @endif>
                                        Nombre: A - Z
                                    </option>
                                    <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'name_desc']) }}" 
                                        @if(request()->get("orderBy") == 'name_desc') selected @endif>
                                        Nombre: Z - A
                                    </option>
                                    <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'price_asc']) }}" 
                                        @if(request()->get("orderBy") == 'price_asc') selected @endif>
                                        Precio más bajo
                                    </option>
                                    <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'price_desc']) }}" 
                                        @if(request()->get("orderBy") == 'price_desc') selected @endif>
                                        Precio más alto
                                    </option>
                                </select>
                            </div>
        
                            <p class="product-count">Resultados: {{$totals->products}}</p>
        
                            <button type="submit" class="search-button">Buscar</button>
                        @endif
                    </form>
                </header>
                
                <div class="catalog"> 
                    <div class="catalog-grid">
                        @foreach ($products as $item)
                            <div class="carousel-item product-card">
                                <a href="{{route('products.show', ['slug' => $item->slug])}}">
                                    <div class="product-image">
                                        <img src="{{ $item->images[0] }}" alt="Product image">
                                    </div>
                                </a>
                                <div class="product-info">
                                    <a href="{{route('products.show', ['slug' => $item->slug])}}">
                                        <p class="product-title">{{$item->name}}</p>
                                        <p class="product-price">${{$item->price}}</p>
                                    </a>
                                    <span class="view-product-link">View Product</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginación -->
                    <div class="pagination">
                        {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}

                    </div>
                </div>
            </section>
        </section>
    </main>

</x-app>
