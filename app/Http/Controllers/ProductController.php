<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Carousel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __invoke($slug)
    {
        // Buscar el producto por su slug y asegurarse de que tenga stock disponible
        $product = Product::where("slug", $slug)->where('stock', '!=', 0)->first();

        // Si el producto existe, procedemos con la lógica
        if ($product) {
            // Obtener los datos del carrusel para la vista
            $carousel = Carousel::getCarousel();

            // Incrementar el contador de visitas directamente en la base de datos
            $product->increment('visited');

            // Verificar si el producto ya está almacenado en caché
            if (Cache::has("product_{$slug}")) {
                // Recuperar el producto desde la caché para evitar consultas innecesarias
                $product = Cache::get("product_{$slug}");
            } else {
                // Procesar las imágenes del producto, convirtiendo rutas locales en URLs accesibles
                $product->images = array_map(function ($item) {
                    return (str_contains($item, 'https://') || str_contains($item, 'http://')) 
                        ? $item 
                        : Storage::url('public/' . $item);
                }, $product->images);

                // Guardar el producto en caché durante 60 minutos para mejorar el rendimiento
                Cache::put("product_{$slug}", $product, now()->addMinutes(60));
            }

            // Retornar la vista del producto con la información correspondiente
            return view("product", ["product" => $product, "carousel" => $carousel]);
        }

        // Si el producto no existe o no tiene stock, redirigir a la página principal
        return redirect(route("home"));
    }


}
