<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
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

test("Item_Cart_Delete_Valid", function () {
    $user = User::find(2);
    $product = Product::find(1);

    $this->actingAs($user);

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
});

test("Item_Cart_Delete_OneAll_Valid", function () {
    $user = User::find(2);
    $product = Product::find(1);

    $this->actingAs($user);

    // Crear el item en el carrito
    $this->put(route("cart.create"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    // Eliminar el item con el endpoint oneAll
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
});

test("Item_Cart_Delete_All_Valid", function () {
    $user = User::find(2);
    $product = Product::find(1);

    $this->actingAs($user);

    // Crear el item en el carrito
    $this->put(route("cart.create"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    // Eliminar todos los items del carrito
    $response = $this->delete(route("cart.destroyAll"));

    $response->assertStatus(302);

    $this->assertDatabaseMissing("carts", [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'sizes' => $product->sizes[0]->sizes,
    ]);
});

test("Item_Cart_Create_Invalid_Size", function () {
    $product = Product::find(1);

    $response = $this->put(route("cart.create"), [
        "sizes" => 43,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route("login"));
});

test("Item_Cart_Delete_Invalid_Unauthenticated", function () {
    $product = Product::find(1);

    $response = $this->delete(route("cart.destroy"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));
});

test("Item_Cart_Delete_OneAll_Invalid_Unauthenticated", function () {
    $product = Product::find(1);

    $response = $this->delete(route("cart.destroy.oneAll"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));
});

test("Item_Cart_Delete_All_Invalid_Unauthenticated", function () {
    $product = Product::find(1);

    $response = $this->delete(route("cart.destroyAll"), [
        "sizes" => $product->sizes[0]->sizes,
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(route("login"));
});

test("Item_Cart_Create_Invalid_Empty_Fields", function () {
    $user = User::find(2);

    $this->actingAs($user);

    $response = $this->put(route("cart.create"), [
        "sizes" => "",
        "product_id" => "dsa"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "sizes",
            "product_id"
        ]);
});

test("Item_Cart_Create_Invalid_Size_Format", function () {
    $this->actingAs(User::find(1));

    $product = Product::find(1);

    $response = $this->put(route("cart.create"), [
        "sizes" => "asdasdsdasd",
        "product_id" => $product->id
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "sizes",
        ]);
});

test("Item_Cart_Delete_Invalid_Fields", function () {
    $this->actingAs(User::find(1));

    $response = $this->delete(route("cart.destroy"), [
        "sizes" => "qweqwe",
        "product_id" => "qwe"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "product_id",
            "sizes"
        ]);
});

test("Item_Cart_Delete_OneAll_Invalid_Fields", function () {
    $this->actingAs(User::find(1));

    $response = $this->delete(route("cart.destroy.oneAll"), [
        "sizes" => "qweqwe",
        "product_id" => "qwe"
    ]);

    $response->assertStatus(302)->assertRedirect(url()->previous())
        ->assertInvalid([
            "product_id",
            "sizes"
        ]);
});

test("Item_Cart_Delete_All_Invalid_Fields", function () {
    $this->actingAs(User::find(1));

    $response = $this->delete(route("cart.destroyAll"));

    $response->assertStatus(302)->assertRedirect(url()->previous());
});
