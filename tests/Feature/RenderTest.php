<?php

use App\Models\User;
use App\Services\CarouselService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Home', function () {
    $response = $this->get(route("home"));

    $carousel = CarouselService::getCarousel()[0];

    $this->assertNotNull($carousel);

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("SHOES FOR YOU")

        // Carousel Test Content
        ->assertSee($carousel->images[0])
        ->assertSee($carousel->name)
        ->assertSee($carousel->price)

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Render_About", function () {
    $response = $this->get(route("about"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Conócenos y camina con nosotros.")
        ->assertSee("Fundada en 2024 en Montemarano")
        ->assertSee("CONTACTAR")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Render_Contact", function () {
    $response = $this->get(route("contact"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Contáctanos")
        ->assertSee("Envíanos un mensaje")
        ->assertSee("+39 388 868 3169")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Render_Policy_Cookie", function () {
    $response = $this->get(route("politica.cookie"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Política de Cookies")
        ->assertSee("Aceptando el uso de cookies mediante el aviso de")
        ->assertSee("Actualizaciones en la Política de Cookies")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Render_Legal_Notice", function () {
    $response = $this->get(route("aviso.legal"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Aviso Legal")
        ->assertSee("titular de este sitio web es NESTOR SALOM")
        ->assertSee("+39 388 868 3169")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Cualquier compra dentro del sitio web no es válida."); // Footer Test
});

test("Render_Privacy_Policy", function () {
    $response = $this->get(route("politica.privacidad"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Política de Privacidad")
        ->assertSee("Somos responsables de los datos recogidos en el")
        ->assertSee("este sitio web se regirá")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Render_Thanks", function () {
    $user = User::find(1);
    
    $this->actingAs($user);

    $response = $this->get(route("thanks"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("/image/logo1.png")
        ->assertSee("Gracias")
        ->assertSee("CONTINUAR COMPRANDO");
});

test("Render_Thanks_Redirect", function () {
    $response = $this->get(route("thanks"));

    $response->assertStatus(302)->assertRedirect(route("login"));
});