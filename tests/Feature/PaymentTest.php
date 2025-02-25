<?php

use App\Models\Product;
use App\Models\User;
use Stripe\Customer;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test("Payment_Valid", function () {
    $product = Product::find(1);
    $user = User::find(2);

    $this->actingAS($user);

    if (!$user->stripe_customer_id) {
        $customer = Customer::create([
            'email' => $user->email,
            'name' => $user->name,
            'source' => 'tok_visa'
        ]);
        $user->stripe_customer_id = $customer->id;
        $user->save();
    }

    $response = $this->put(route("cart.create"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => $product->sizes[0]->sizes,
    ]);

    $response = $this->post("/register-card", [
        'cardholder_name' => $user->name,
        'email' => $user->email,
        'stripeToken' => 'tok_visa',
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("cart"));

    $response = $this->post(route('payment.process'));

    $response->assertStatus(302)
            ->assertRedirect(route("thanks"));
});

test("Payment_Invalid_Unauthenticated", function () {
    $response = $this->post(route("payment.process"));
    
    $response->assertStatus(302)
        ->assertRedirect(route("login"));
});

test("Payment_Invalid_Empty_Cart", function () {
    $user = User::find(2);
    $this->actingAs($user);

    if (!$user->stripe_customer_id) {
        $customer = Customer::create([
            'email' => $user->email,
            'name' => $user->name,
            'source' => 'tok_visa' // Token de prueba de Stripe
        ]);
        $user->stripe_customer_id = $customer->id;
        $user->save();
    }

    $response = $this->post(route("payment.process"));
    
    $response->assertSessionHasErrors('cart_empty');
});

test("Payment_Invalid_Negative_Price", function () {
    $user = User::find(2);
    $this->actingAs($user);

    $product = Product::create([
        "name" => "Test",
        "description" => "Test",
        "price" => -12, 
        "gender" => "unisex",
        "images" => "images",
        "stock" => 12,
        "brand" => "Nike",
    ]);

    $product->sizes()->sync([8, 10]);

    $response = $this->put(route("cart.create"), [
        "sizes" => 44, 
        "product_id" => $product->id
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => 44,
    ]);

    $response = $this->post(route("payment.process"));

    $response->assertSessionHasErrors('amount_error');
});
