<?php

use App\Models\Product;
use App\Services\CarouselService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Shopping', function () {
    $response = $this->get(route("shopping"));

    $product = Product::find(1);

    $this->assertNotNull($product);

    $image = json_decode($product->images);

    $image = Storage::url($image[0]);

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Unisex")
        ->assertSee($image)
        ->assertSee($product->name)
        ->assertSee($product->price)

        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer;
});

test('Shopping_Filter', function () {
    $response = $this->get(route("shopping", [
        'orderBy' => 'name_asc',
        'gender' => "hombre"
    ]));

    $product = Product::where('gender', 'hombre')
        ->orderBy('name', 'asc')
        ->first();

    $this->assertNotNull($product);

    $image = json_decode($product->images);

    $image = Storage::url($image[0]);

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Unisex")
        ->assertSee($image)
        ->assertSee($product->name)
        ->assertSee($product->price)

        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer;
});

test('Shopping_Filter_BestSeller', function () {
    $response = $this->get(route("shopping", [
        'bestSellers' => 'name_asc',
        'gender' => "mujer"
    ]));

    $product = Product::where('gender', 'mujer')
        ->where('sell', '!=', 0)
        ->orderBy('sell', 'ASC')
        ->first();

    $this->assertNotNull($product);

    $image = json_decode($product->images);

    $image = Storage::url($image[0]);

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Unisex")
        ->assertSee($image)
        ->assertSee($product->name)
        ->assertSee($product->price)

        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer;
});

test('Product', function () {
    $product = Product::find(1);

    $this->assertNotNull($product);

    $response = $this->get(route("products.show", [
        'slug' => $product->slug
    ]));

    $decoded = json_decode($product->images);

    $images = collect($decoded)->map(fn($item)=>Storage::url($item));

    $carousel = CarouselService::getCarousel()[0];

    $this->assertNotNull($carousel);

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee($product->gender)
        ->assertSee($images[0])
        ->assertSee($images[1])
        ->assertSee($images[2])
        ->assertSee($product->name)
        ->assertSee($product->price)
        ->assertSee($product->brand)

        // Carousel Test Content
        ->assertSee($carousel->images[0])
        ->assertSee($carousel->name)
        ->assertSee($carousel->price)

        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer;
});

