<?php

use App\Services\CarouselService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Home', function () {
    $response = $this->get(route("home"));

    $carousel = CarouselService::getCarousel()[0];

    $this->assertNotNull($carousel);

    $response->assertStatus(200)
        ->assertSee("SHOES FOR YOU")

        ->assertSee($carousel->images[0])
        ->assertSee($carousel->name)
        ->assertSee($carousel->price)

        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer
});

test("Render_About", function () {
    $response = $this->get(route("about"));

    $response->assertStatus(200)
        ->assertSee("Conócenos y camina con nosotros.")
        ->assertSee("Fundada en 2024 en Montemarano")
        ->assertSee("CONTACTAR")
        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer
});

test("Render_Contact", function () {
    $response = $this->get(route("contact"));

    $response->assertStatus(200)
        ->assertSee("Contáctanos")
        ->assertSee("Envíanos un mensaje")
        ->assertSee("+39 388 868 3169")
        ->assertSee("Damas") // Test Menu
        ->assertSee("Todos los derechos reservados"); // Test footer
});