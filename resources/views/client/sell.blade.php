<x-app>
    <x-slot name="title">Manage Purchases {{Auth::user()->name}}</x-slot>

    <main>
        <!-- Contenido de la portada principal -->
        <div class="user-dashboard">
            <x-panel/>

            <div class="account-info">
                <div class="greeting">
                    <h3>Nuestros Productos</h3>
                </div>
                <div class="user-data">
                    <table class="stats-table">
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Count</th>
                            <th>Precio</th>
                            <th class="hidden-column">Talla</th>
                            <th>Fecha</th>
                        </tr>
                        <?php $rowVariant = 1 ?>
                        @foreach ($sells as $item)
                            <tr class="product-row variant-{{$rowVariant}}">
                                <td class="text-center">
                                    <img src="{{ Storage::url($item->product->imageP) }}" 
                                         alt="{{$item->product->name}}" 
                                         height="50" width="50">
                                </td>
                                <td>{{$item->product->name}}</td>
                                <td class="text-center">{{$item->count}}</td>
                                <td class="text-center">{{$item->price}}</td>
                                <td class="text-center hidden-column">{{$item->size}}</td>
                                <td class="text-center">{{$item->created_at}}</td>
                            </tr>
                            <?php $rowVariant = $rowVariant == 1 ? 0 : 1; ?>
                        @endforeach
                    </table>                    
                </div>
            </div>
        </div>
    </main>
</x-app>