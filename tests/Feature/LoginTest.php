<?php

use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate --seed'); // Asegura que las migraciones y semillas se ejecuten
});

test('Render_Login', function () {
    $response = $this->get(route("login"));

    $response->assertStatus(200)
        ->assertSee("Login")
        ->assertSee("Password")
        ->assertSee("have an account?")
        ->assertSee("Sign up");
});

test('Valid_Login', function () {
    $response = $this->post(route("login.post", [
        'email' => 'nd10salom@gmail.com',
        'password' => 'cronos098'
    ]));

    $response->assertStatus(302)->assertRedirect(route("home"));
});

test('Invalid_Login', function () {
    // Test - 1
    $response = $this->post(route("login.post", [
        'email' => 'nd10salomgmail.com',
        'password' => 'cronos098'
    ]));

    $response->assertStatus(302)
        ->assertInvalid('email');

    // Test - 2
    $response = $this->post(route("login.post", [
        'email' => 'nd10salom@gmail.com',
        'password' => ''
    ]));

    $response->assertStatus(302)
        ->assertInvalid('password');

    // Test - 3
    $response = $this->post(route("login.post", [
        'email' => 'nd10salom@gmail',
        'password' => 'cronos123123123'
    ]));

    $response->assertStatus(302)
        ->assertSessionHasErrors([
            'login' => 'Las credenciales proporcionadas son incorrectas.'
        ]);
});

test('Render_Register', function () {
    $response = $this->get(route("register"));

    $response->assertStatus(200)
        ->assertSee("Sign up")
        ->assertSee("Name and Lastname")
        ->assertSee("have an account?")
        ->assertSee("Sign up");
});

test('Valid_Register', function () {
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

test('Invalid_Register', function () {
    // Test - 1
    $response = $this->post(route("register.post", [
        'name' => '',
        'email' => 'nd10salom@gmail.com',
        'password' => 'asd',
        'terms' => false,
    ]));
    
    $response->assertStatus(302)
        ->assertInvalid([
            'name',
            'email',
            'password', 
            'terms'
        ]);

    // Test - 2
    $response = $this->post(route("register.post", [
        'name' => 'Nestor',
        'email' => '',
        'password' => 'Cronos098',
        'terms' => false,
    ]));
    
    $response->assertStatus(302)
        ->assertInvalid([
            'email',
            'terms',
        ]);
    

    // Test - 3
    $response = $this->post(route("register.post", [
        'name' => 'Nestor',
        'email' => 'trabajo.nestor@gmail.com',
    ]));
    
    $response->assertStatus(302)
        ->assertInvalid([
            'password',
            'terms',
        ]);
});
