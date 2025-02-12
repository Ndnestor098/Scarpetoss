<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_List_Products_Page', function () {
    $this->actingAs(User::find(1)); // Crea usuario de prueba

    $response = $this->get(route("products"));

    $response->assertStatus(200)
        ->assertSee("Nuestros Productos")
        ->assertSee("Nombre")
        ->assertSee("Stock")
        ->assertSee("Proveedor");
});

test('Render_Create_Product_Page', function () {
    $this->actingAs(User::find(1));

    $response = $this->get(route("products.create"));

    $response->assertStatus(200)
        ->assertSee("Crear Producto")
        ->assertSee("Precio")
        ->assertSee("Stock")
        ->assertSee("Crear");
});

test('Render_Edit_Product_Page', function () {
    $this->actingAs(User::find(1));

    $product = Product::find(1);

    $response = $this->get(route("products.edit", ["id" => $product->id]));

    $response->assertStatus(200)
        ->assertSee("Producto: " . $product->name)
        ->assertSee($product->price)
        ->assertSee($product->stock)
        ->assertSee($product->brand);
});

test('Render_List_Products_Page_Invalid', function () {
    $response = $this->get(route("products"));

    $response->assertStatus(302)
        ->assertSee(route("home"));
});

test('Render_Create_Product_Page_Invalid', function () {
    $response = $this->get(route("products.create"));

    $response->assertStatus(302)
        ->assertSee(route("home"));
});

test('Render_Edit_Product_Page_Invalid', function () {
    $product = Product::find(1);

    $response = $this->get(route("products.edit", [
        "id" => $product->id,
    ]));

    $response->assertStatus(302)
        ->assertSee(route("home"));;
});

test('Render_List_Users_Page', function () {
    $this->actingAs(User::find(1)); // Crea usuario de prueba

    $response = $this->get(route("users"));

    $response->assertStatus(200)
        ->assertSee("ID")
        ->assertSee("Nombre")
        ->assertSee("Eliminar")
        ->assertSee("Creado");
});

test('Render_Create_User_Page', function () {
    $this->actingAs(User::find(1));

    $response = $this->get(route("users.create"));

    $response->assertStatus(200)
        ->assertSee("Crear Nuevo Usuario Administrador")
        ->assertSee("Clave")
        ->assertSee("Nombre")
        ->assertSee("Crear");
});

test('Render_List_Users_Page_Invalid', function () {
    $response = $this->get(route("users"));

    $response->assertStatus(302)
        ->assertSee(route("home"));
});

test('Render_Create_User_Page_Invalid', function () {

    $response = $this->get(route("users.create"));

    $response->assertStatus(302)
        ->assertSee(route("home"));
});

test('Craete_User_Valid', function () {
    $this->actingAs(User::find(1));

    $response = $this->post(route("users.store",[
        'name' => "Test_1",
        'email' => "test@gmail.com",
        'password' => "test123098",
        'password_confirmation' => "test123098",
    ]));

    $response->assertStatus(302)
        ->assertSee(route('users'));

    $this->assertDatabaseHas('users',[
        'name' => "Test_1",
        'email' => "test@gmail.com",
    ]);
});

test('Create_User_Invalid', function () {
    // ================ Test - 1 ================
    $response = $this->post(route("users.store"), [
        'name' => "New User",
        'email' => "newuser@example.com",
        'password' => "password123",
        'password_confirmation' => "password123",
    ]);
    $response->assertStatus(302)
        ->assertRedirect(route("home"));

    
    // ================ Test - 2 ================
    $this->actingAs(User::find(1));  

    $response = $this->post(route("users.store"), [
        'name' => "",  
        'email' => "test123@", 
        'password' => "t",  
    ]);
 
    $response->assertSessionHasErrors([
        'name', 
        'email',  
        'password', 
    ]);

    
});

test('Delete_User_Valid', function () {
    $createdUser = User::create([
        'name' => "Test_1",
        'email' => "test@gmail.com",
        'password' => bcrypt('test123098'),
        'password_confirmation' => "test123098",
    ]);
    
    $createdUserId = $createdUser->id;

    $this->actingAs(User::find(1));
    
    $this->assertDatabaseHas('users', [
        'name' => "Test_1",
        'email' => "test@gmail.com",
    ]);
    
    $response = $this->delete(route("users.delete", [
        'id' => $createdUserId,
    ]));
    
    $response->assertStatus(302)
        ->assertRedirect(route('users'));
    
    $this->assertDatabaseMissing('users', [
        'name' => "Test_1",
        'email' => "test@gmail.com",
    ]);
});

test('Delete_User_Inalid', function () {
    // ================ Test - 1 ================
    $response = $this->delete(route("users.delete", [
        'id' => 1,
    ]));
    
    $response->assertStatus(302)
        ->assertRedirect(route('home'));

    // ================ Test - 2 ================
    $this->actingAs(User::find(1));

    $response = $this->delete(route("users.delete", [
        'id' => -1,
    ]));
    
    $response->assertStatus(404);
});
