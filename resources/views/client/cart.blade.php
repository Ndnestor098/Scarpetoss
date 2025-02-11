<x-app>
    <x-slot name="title">tu carrito ({{$count}} articulos)</x-slot>

    <main>
        <!-- Contenido de la portada principal -->
        {{-- <div class="Portada-cart">
            <div class="cantenido-productos-cart">
                <div class="area-productos">
                    <!-- muestra todos los datos del carrito -->
                    @if (isset($data[0]))
                        @foreach ($data as $item)
                            <div class="producto">
                                <div class="img-producto">
                                    <img src="{{ $item->product->images[0] }}" alt="zapatos">
                                </div>
                                <div class="info-producto">
                                    <a href="{{route('products.show', ["slug"=> $item->product->slug])}}">
                                        <div class="title-producto">
                                            <h5>{{$item->product->brand}}</h5>
                                            <p>{{$item->product->name}}</p>
                                        </div>
                                    </a>
                                    <div class="descripcion-producto">
                                        <p>Cantidad: {{$item->count_total}}</p>
                                        <p>Talla: {{$item->sizes}}</p>
                                    </div>
                                    <div class="opciones">
                                        <form action="{{route("cart.destroy")}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input type="hidden" name="sizes" value="{{$item->sizes}}">
                                            <button type="submit"><i class="fa-solid fa-trash" style="display:flex;gap:10px;">eliminar</i></button>
                                        </form>
                                        <form action="{{route("cart.destroy.oneAll")}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input type="hidden" name="sizes" value="{{$item->sizes}}">
                                            <button type="submit"><i class="fa-solid fa-trash" style="display:flex;gap:10px;">eliminar Todo</i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="precio-producto">
                                    <p>${{$item->product->price * $item->count_total}}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="deleteAll">
                            <form action="{{route("cart.destroyAll")}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit">Eliminar todos los productos</button>
                            </form>
                        </div>
                    @else
                        <div class="producto-vacio">
                            <p class="title">Tu carrito de compra está vacío</p>
                            <p>Añade productos al carrito de compra</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="cantenido-pago-cart">
                <div class="area-pago">
                    <!-- Caso contrario se muestra lo que esta guardado en la canasta del carrito -->
                    @if(!empty($data))
                        @php
                            $valor = 0;
                        @endphp
                        @foreach ($data as $item)
                            @php
                                $valor += $item->product->price * $item->count_total; 
                            @endphp 
                        @endforeach

                        <div class="title-pago">
                            <p>Resumen</p>
                        </div>
                        <div class="resumen-pago">
                            <div>
                                <p style="font-size: 15px">Valor de productos</p>
                                <p>Entrega</p>
                            </div>
                            <div style="text-align:end;">
                                <p style="font-size: 17px;font-weight: 500; color: #435334;">${{$valor}}</p>
                                @if (auth()->user()->address)
                                    <p><span>{{auth()->user()->address}}</span></p>
                                @else
                                    <a href="{{route("client.details")}}">
                                        <span style="font-size: 15px; font-weight: 500; color:#435334">Agregar Direccion</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                            <div class="iva">
                                <div>
                                <p style="font-size: 15px">A pagar (IVA incluido)</p>
                            </div>
                            <div style="text-align:end;">
                                <p style="font-size: 17px;font-weight: 500;color: #435334;">${{$valor}}</p>
                            </div>
                        </div>
                        <div class="button-pagar">
                            @if (auth()->user()->address)
                                @if (auth()->user()->card_last_four)
                                    <a href="{{route('payment.process', ['amount'=>$valor])}}"><span>COMPRAR</span></a>
                                @else
                                    <a href="{{route("stripe.index")}}"><span>AGREGAR METODO DE PAGO</span></a>
                                @endif
                            @else
                                <a href="{{route("client.details")}}"><span>AGREGAR DIRECCION</span></a>
                            @endif
                        </div>
                        
                    @else
                        <style>.area-pago{background-color: #fff !important;}</style>
                        <div class="button-pagar">
                            <a href="{{route("shopping")}}" style="padding: 0px 100px;"><span>IR A COMPRAR</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </div> --}}
        
        <div class="cart-container">
            <div class="cart-content">
                <section class="cart-items">
                    <!-- Display all cart items -->
                    @if (isset($data[0]))
                        @foreach ($data as $item)
                            <article class="cart-item">
                                <figure class="product-image">
                                    <img src="{{ $item->product->images[0] }}" alt="Product Image">
                                </figure>
                                <div class="product-details">
                                    <a href="{{route('products.show', ['slug'=> $item->product->slug])}}">
                                        <div class="product-title">
                                            <h5>{{$item->product->brand}}</h5>
                                            <p>{{$item->product->name}}</p>
                                        </div>
                                    </a>
                                    <div class="product-description">
                                        <p>Cantidad: {{$item->count_total}}</p>
                                        <p>Talla del Producto: {{$item->sizes}}</p>
                                    </div>
                                    <div class="product-options">
                                        <form action="{{route('cart.destroy')}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input type="hidden" name="sizes" value="{{$item->sizes}}">
                                            <button type="submit"><i class="fa-solid fa-trash"></i> Elimina</button>
                                        </form>
                                        <form action="{{route('cart.destroy.oneAll')}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input type="hidden" name="sizes" value="{{$item->sizes}}">
                                            <button type="submit"><i class="fa-solid fa-trash"></i> Elimina Todos</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <p>${{$item->product->price * $item->count_total}}</p>
                                </div>
                            </article>
                        @endforeach
                        <div class="delete-all">
                            <form action="{{route('cart.destroyAll')}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit">Eliminar Todos Los Productos</button>
                            </form>
                        </div>
                    @else
                        <div class="empty-cart">
                            <p class="title">Your shopping cart is empty</p>
                            <p>Add products to your cart</p>
                        </div>
                    @endif
                </section>
            </div>
            <div class="cart-payment-content">
                <section class="payment-summary">
                    @if(!empty($data))
                        @php $total = 0; @endphp
                        @foreach ($data as $item)
                            @php $total += $item->product->price * $item->count_total; @endphp 
                        @endforeach
        
                        <div class="summary-title">
                            <p>Resumen de la Orden</p>
                        </div>

                        <div class="summary-details">
                            <span class="summary-details-title">Precio de los productos</span>
                            <span class="summary-details-value">${{$total}}</span>
                        </div>

                        <div class="summary-address">
                            <p>Entregar</p>
                            @if (auth()->user()->address)
                                <p><span>{{auth()->user()->address}}</span></p>
                            @else
                                <a 
                                    href="{{route('client.details')}}"
                                    style="font-weight:600; font-size:15px; color:#435334"
                                >
                                    Add Address
                                </a>
                            @endif
                        </div>

                        <div class="summary-details">
                            <span class="summary-details-title">A pagar (IVA incluido)</span>
                            <span class="summary-details-value">${{ $total }}</span>
                        </div>
                        
                        <div class="payment-button">
                            @if (auth()->user()->address)
                                @if (auth()->user()->card_last_four)
                                    <form id="payment-form" action="{{ route('payment.process') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-payment" style="border: none; height:50px;cursor: pointer;">COMPRAR</button>
                                    </form>
                                @else
                                    <a href="{{route("stripe.index")}}" class="btn-payment">AGREGAR METODO DE PAGO</a>
                                @endif
                            @else
                                <a href="{{route("client.details")}}" class="btn-payment">AGREGAR DIRECCION</a>
                            @endif
                        </div>
                    @else
                        <div class="payment-button">
                            <a href="{{route('shopping')}}"><span>IR A COMPRAR</span></a>
                        </div>
                    @endif
                </section>
            </div>
        </div>
        
    </main>
</x-app>