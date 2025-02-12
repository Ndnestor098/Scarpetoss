<?php

use App\Services\CarouselService;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Service_Carousel', function () {
    $service = CarouselService::getCarousel();

    $this->assertNotEmpty($service);

    $this->assertInstanceOf(\Illuminate\Support\Collection::class, $service);

    $this->assertNotEmpty($service);

    foreach ($service as $product) {
        $this->assertNotEmpty($product->images, "El producto {$product->id} no tiene imágenes.");
        
        foreach ($product->images as $image) {
            $this->assertStringStartsWith("/storage", $image, "La imagen {$image} no es una URL válida.");
        }
    }

});
