<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CarouselService
{
    static public function getCarousel()
    {
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
                if (str_contains($item, 'https://') || str_contains($item, 'http://')) {
                    return $item;
                }
        
                // Decodificar JSON
                $decoded = json_decode($item, true);
        
                // Si es un array, transformar las rutas
                if (is_array($decoded)) {
                    return array_map(fn($img) => Storage::url('public/' . $img), $decoded);
                }
        
                return Storage::url('public/' . $item);
            })->flatten()->toArray();
        
            return $carousel;
        });
        
        // Guardar en caché por 60 minutos
        Cache::put('carousel', $carousel, now()->addMinutes(60));

        return $carousel;
    }
}