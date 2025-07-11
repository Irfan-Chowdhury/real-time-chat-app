<?php

//Command: ./vendor/bin/pest tests/Feature/DashboardTest.php

use App\Models\User;
use App\Services\ChatService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);


test('authenticated user can view dashboard and see users list', function () {
    // Arrange
    $authUser = User::factory()->create();
    $this->actingAs($authUser);

     User::factory()->count(2)->create();

    // Act
    $response = $this->get(route('dashboard'));

    // Assert
    $response->assertStatus(200);
    $response->assertViewIs('dashboard');
    $response->assertViewHas('users', function ($users) use ($authUser) {
        // Check that the authenticated user is excluded
        return $users->every(fn ($user) => $user->id !== $authUser->id);
    });
});




