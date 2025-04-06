
@props(['carousel'])

<section class="carousel"> 
    <article class="carousel-content">
        @foreach ($carousel as $item)
            <div class="carousel-item">
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
                    <span class="view-product-link">Ver Producto</span>
                </div>
            </div>
        @endforeach

        <div class="carousel-arrows">
            <button class="carousel-left" onclick="sliderLeft()">&lt;</button>
            <button class="carousel-right" onclick="sliderRight()">&gt;</button>
        </div>
    </article>
</section>
