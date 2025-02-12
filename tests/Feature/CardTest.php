<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test("Render_Register_Card_Page_Valid", function () {
    $user = User::find(2);

    $this->actingAs($user);

    $response = $this->get(route("stripe.index"));

    $response->assertStatus(200)
        // Page Test Content
        ->assertSee("Payment Method")
        ->assertSee($user->email)
        ->assertSee("Agregar Metodo de Pago")

        ->assertSee("Damas") // Menu Test
        ->assertSee("Todos los derechos reservados"); // Footer Test
});

test("Register_Card_Valid", function () {
    $user = User::find(2);

    $this->actingAs($user);

    $response = $this->post(route("stripe.createPay"), [
        'cardholder_name' => $user->name,
        'email' => $user->email,
        'stripeToken' => 'tok_visa',
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("cart"));
});

test("Update_Card_Valid", function () {
    $user = User::find(1);

    $this->actingAs($user);

    $response = $this->post(route('payment.update'),[
        'password' => 'cronos098',
        'stripeToken' => 'tok_visa',
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("client"));
}); 

test("Render_Register_Card_Page_Invalid_Unauthenticated", function () {
    $response = $this->get(route("stripe.index"));

    $response->assertStatus(302)
        ->assertRedirect(route("login")); // Footer Test
});

test("Register_Card_Invalid_Unauthenticated", function () {
    $response = $this->post(route("stripe.createPay"), [
        'cardholder_name' => "asd",
        'email' => "asd",
        'stripeToken' => 'tok_visa',
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("login"));
});

test("Register_Card_Invalid_Field", function () {
    $this->actingAs(User::find(2));

    $response = $this->post(route("stripe.createPay"), [
        'cardholder_name' => "",
        'email' => "sdasds",
        'stripeToken' => '',
    ]);

    $response->assertStatus(302)
        ->assertInvalid([
            "cardholder_name",
            "email",
            "stripeToken",
        ])
        ->assertRedirect(url()->previous());
});

test("Update_Card_Invalid_Unauthenticated", function () {
    $response = $this->post(route('payment.update'),[
        'password' => '',
        'stripeToken' => '',
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('login'));
}); 

test("Update_Card_Invalid_Field", function () {
    $this->actingAs(User::find(1));

    $response = $this->post(route('payment.update'));

    $response->assertStatus(302)
        ->assertInvalid([
            'password',
            'stripeToken'
        ]);
}); 