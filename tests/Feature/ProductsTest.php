<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Shopping', function () {
    $response = $this->get(route("shopping"));

    $product = Product::find(1);
    if ($product === null) {
        $this->fail('Product not found in the database.');
    }

    $response->assertStatus(200)
        ->assertSee("Unisex")
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
        ->orderBY('name', 'asc')
        ->first();

    if ($product === null) {
        $this->fail('Product not found in the database.');
    }

    $response->assertStatus(200)
        ->assertSee("Unisex")
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

    if ($product === null) {
        $this->fail('Product not found in the database.');
    }

    $image = json_decode($product->images);

    $image = Storage::url($image[0]);

    $response->assertStatus(200)
        ->assertSee("Unisex")
        ->assertSee($image)
        ->assertSee($product->name)
        ->assertSee($product->price)
        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer;
});