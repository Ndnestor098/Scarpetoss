<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Login_Page_Valid', function () {
    $response = $this->get(route("login"));

    $response->assertStatus(200)
        ->assertSee("Login")
        ->assertSee("Password")
        ->assertSee("have an account?")
        ->assertSee("Sign up");

    $this->actingAs(User::find(1));

    $response = $this->get(route("login"));

    $response->assertStatus(302)->assertRedirect(route("home"));
});

test('Login_Valid', function () {
    $response = $this->post(route("login.post", [
        'email' => 'nd10salom@gmail.com',
        'password' => 'cronos098'
    ]));

    $response->assertStatus(302)
        ->assertRedirect(route("home"));
});

test('Render_Register_Page', function () {
    $response = $this->get(route("register"));

    $response->assertStatus(200)
        ->assertSee("Sign up")
        ->assertSee("Name and Lastname")
        ->assertSee("have an account?")
        ->assertSee("Sign up");
});

test('Register_Valid', function () {
    $response = $this->post(route("register.post", [
        'name' => 'Nestor Daniel',
        'email' => 'trabajo.nestor.098@gmail.com',
        'password' => 'Cronos09888',
        'terms' => true,
    ]));

    $response->assertStatus(302)->assertRedirect(route("home"));

    $this->assertDatabaseHas('users', [
        'email' => 'trabajo.nestor.098@gmail.com',
    ]);    
});

test('Render_Login_Page_Invalid_Authenticated', function () {
    $this->actingAs(User::find(1));

    $response = $this->get(route("login"));

    $response->assertStatus(302)->assertRedirect(route("home"));
});

test('Login_Invalid_Field', function () {
    $response = $this->post(route("login.post", [
        'email' => 'nd10salomgmail.com',
        'password' => ''
    ]));

    $response->assertStatus(302)
        ->assertInvalid([
            'email',
            'password'
        ]);
});

test('Login_Invalid_Authenticated', function () {
    $this->actingAs(User::find(1));

    $response = $this->post(route("login.post", [
        'email' => 'nd10salom@gmail',
        'password' => 'cronos123123123'
    ]));

    $response->assertStatus(302)->assertRedirect(route("home"));
});

test('Render_Register_Page_Invalid_Authenticated', function () {
    $this->actingAs(User::find(1));

    $response = $this->get(route("register"));

    $response->assertStatus(302)->assertRedirect(route("home"));
});

test('Register_Invalid_Fields', function () {
    $response = $this->post(route("register.post", [
        'name' => '',
        'email' => 'trabajo',
    ]));
    
    $response->assertStatus(302)
        ->assertInvalid([
            'name',
            'email',
            'password',
            'terms',
        ]);
});

test('Register_Invalid_Authenticated', function () {
    $this->actingAs(User::find(1));

    $response = $this->post(route("register.post", [
        'name' => 'Nestor Daniel',
        'email' => 'trabajo.nestor.098@gmail.com',
        'password' => 'Cronos09888',
        'terms' => true,
    ]));

    $response->assertStatus(302)->assertRedirect(route("home"));
});