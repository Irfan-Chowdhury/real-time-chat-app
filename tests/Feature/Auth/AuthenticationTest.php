<?php

//Command: ./vendor/bin/pest tests/Feature/Auth/AuthenticationTest.php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);




test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
})->skip();


test('login with email and password', function () {

    $this->post('/login',[
        'email' => 'admin@gmail.com',
        'password' => 'admin12345',
    ]);

    $this->assertAuthenticated();
});


// test('users can authenticate using the login screen', function () {
//     $user = User::factory()->create();

//     $response = $this->post('/login', [
//         'email' => 'admin@gmail.com',
//         'password' => 'admin@gmail.com',
//     ]);

//     $this->assertAuthenticated();
//     $response->assertRedirect(route('dashboard', absolute: false));
// });







// test('login with username and password', function () {

//     $user = User::factory()->create();

//     // $this->post('/login',[
//     //     'email' => 'admin@gmail.com',
//     //     'password' => 'admin12345',
//     // ]);
//     $this->post('/login',[
//         'email' => $user->email,
//         'password' => 'admin12345',
//     ]);


//     $this->assertAuthenticated();
// });


// test('users can authenticate using the login screen', function () {
//     $user = User::factory()->create();

//     $response = $this->post('/login', [
//         'email' => $user->email,
//         'password' => 'admin12345',
//     ]);

//     $this->assertAuthenticated();
//     $this->withoutExceptionHandling();
//     $response->assertRedirect(route('dashboard', absolute: false));
// });


// test('users can not authenticate with invalid password', function () {
//     $user = User::factory()->create();

//     $this->post('/login', [
//         'email' => $user->email,
//         'password' => 'wrong-password',
//     ]);

//     $this->assertGuest();
// });

// test('users can logout', function () {
//     $user = User::factory()->create();

//     $response = $this->actingAs($user)->post('/logout');

//     $this->assertGuest();
//     $response->assertRedirect('/');
// });
