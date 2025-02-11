<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Client_Area', function () {
    $user = User::find(2);
    
    $this->actingAs($user);

    // Page Test Client Index
    $response = $this->get(route("client"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Mis datos")
        ->assertSee("Cerrar sesion");

    // Page Test Client Details
    $response = $this->get(route("client.details"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Guardar Cambios")
        ->assertSee("Clave Nueva");

    // Page Test Client Payment
    $response = $this->get(route("payment.edit"));

    $response->assertStatus(200)
        ->assertSee("Hola, {$user->name}")
        ->assertSee($user->email)
        ->assertSee("Guardar Cambios")
        ->assertSee("Tarjeta de credito o debito");
       
    // Page Test Client Purchase
    $response = $this->get(route("purchase"));

    $response->assertStatus(200)
        ->assertSee("Nuestros Productos")
        ->assertSee("Imagen")
        ->assertSee("Precio")
        ->assertSee("Fecha");
});

test('Render_Client_Area_Invalid', function () {
    // Page Test Client Index
    $response = $this->get(route("client"));

    $response->assertStatus(302);

    // Page Test Client Details
    $response = $this->get(route("client.details"));

    $response->assertStatus(302);

    // Page Test Client Payment
    $response = $this->get(route("payment.edit"));

    $response->assertStatus(302);
       
    // Page Test Client Purchase
    $response = $this->get(route("purchase"));

    $response->assertStatus(302);
});

test("Render_Cart", function () {
    $user = User::find(2);

    $this->actingAS($user);

    $response = $this->get(route("cart"));

    $response->assertStatus(200);
});

test("Render_Cart_Invalid", function () {
    $response = $this->get(route("cart"));

    $response->assertStatus(302);
});

test("Item_Cart_Valid", function () {
    // ============== Test - 1 ==============
    $user = User::find(2);
    $product = Product::find(1);

    $this->actingAS($user);

    //  Created - 1
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

    // ============== Test - 2 ==============
    $response = $this->delete(route("cart.destroy"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous());

    $this->assertDatabaseMissing("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => $product->sizes[0]->sizes,
    ]);

    // ============== Test - 3 ==============
    //  Created - 2
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

    $response = $this->delete(route("cart.destroy.oneAll"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous());

    $this->assertDatabaseMissing("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => $product->sizes[0]->sizes,
    ]);

    // ============== Test - 4 ==============
    //  Created - 2
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
    
    $response = $this->delete(route("cart.destroyAll"));

    $response->assertStatus(302);

    $this->assertDatabaseMissing("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => $product->sizes[0]->sizes,
    ]);
});

test("Item_Cart_Invalid", function () {
    // ============== Test - 1 ==============
    $product = Product::find(1);

    $response = $this->put(route("cart.create"), [
        "sizes" => 43,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("login"));

    // ============== Test - 2 ==============
    $response = $this->delete(route("cart.destroy"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));

    // ============== Test - 3 ==============
    $response = $this->delete(route("cart.destroy.oneAll"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));

    // ============== Test - 4 ==============
    $response = $this->delete(route("cart.destroyAll"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));

    // ============== Test - 5 ==============
    $user = User::find(2);

    $this->actingAS($user);

    $response = $this->put(route("cart.create"), [
        "sizes" => "",
        "product_id" => "dsa"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "sizes",
            "product_id"
        ]);
    
    // ============== Test - 6 ==============
    $product = Product::find(1);

    $response = $this->put(route("cart.create"), [
        "sizes" => "asdasdsdasd",
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "sizes",
        ]);

    // ============== Test - 7 ==============
    $response = $this->delete(route("cart.destroy"), [
        "sizes" => "qweqwe",
        "product_id" => "qwe"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "product_id",
            "sizes"
        ]);

    // ============== Test - 8 ==============
    $response = $this->delete(route("cart.destroy.oneAll"), [
        "sizes" => "qweqwe",
        "product_id" => "qwe"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "product_id",
            "sizes"
        ]);

    // ============== Test - 4 ==============
    $response = $this->delete(route("cart.destroyAll"));

    $response->assertStatus(302)->assertRedirect(url()->previous());

});