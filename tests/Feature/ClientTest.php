<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Client_Index_Valid', function () {
    $user = User::find(2);
    $this->actingAs($user);

    $response = $this->get(route("client"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Mis datos")
        ->assertSee("Cerrar sesion");
});

test('Render_Client_Details_Valid', function () {
    $user = User::find(2);
    $this->actingAs($user);

    $response = $this->get(route("client.details"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Guardar Cambios")
        ->assertSee("Clave Nueva");
});

test('Render_Client_Payment_Valid', function () {
    $user = User::find(2);
    $this->actingAs($user);

    $response = $this->get(route("payment.edit"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Guardar Cambios")
        ->assertSee("Tarjeta de credito o debito");
});

test('Render_Client_Purchase_Valid', function () {
    $user = User::find(2);
    $this->actingAs($user);

    $response = $this->get(route("purchase"));

    $response->assertStatus(200)
        ->assertSee("Nuestros Productos")
        ->assertSee("Imagen")
        ->assertSee("Precio")
        ->assertSee("Fecha");
});

test('Render_Client_Index_Invalid_Unauthenticated', function () {
    $response = $this->get(route("client"));
    $response->assertStatus(302)->assertRedirect(route('login'));
});

test('Render_Client_Details_Invalid_Unauthenticated', function () {
    $response = $this->get(route("client.details"));
    $response->assertStatus(302)->assertRedirect(route('login'));
});

test('Render_Client_Payment_Invalid_Unauthenticated', function () {
    $response = $this->get(route("payment.edit"));
    $response->assertStatus(302)->assertRedirect(route('login'));
});

test('Render_Client_Purchase_Invalid_Unauthenticated', function () {
    $response = $this->get(route("purchase"));
    $response->assertStatus(302)->assertRedirect(route('login'));
});