<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Carousel
{
    static public function getCarousel()
    {
         // Si el carrusel ya está en caché, retornarlo
        if (Cache::has('carousel')) {
            return Cache::get('carousel');
        }

        // Obtener productos en orden aleatorio con stock disponible (máximo 8)
        $carousel = Product::where('stock', '>', 0)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        // Procesar las imágenes de cada producto
        $carousel->transform(function ($carousel) {
            $carousel->images = collect($carousel->images)->map(function ($item) {
                return (str_contains($item, 'https://') || str_contains($item, 'http://')) 
                    ? $item 
                    : Storage::url('public/' . $item);
            })->toArray();

            return $carousel;
        });

        // Guardar en caché por 60 minutos
        Cache::put('carousel', $carousel, now()->addMinutes(60));

        return $carousel;
    }
}