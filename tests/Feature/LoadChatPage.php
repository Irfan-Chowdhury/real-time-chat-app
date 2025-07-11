<?php

//Command: ./vendor/bin/pest tests/Feature/LoadChatPage.php

use App\Models\User;
use App\Services\ChatService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);




test('chat page loads with user and users list using ChatService', function () {
    // Fake the logged-in user
    $authUser = User::factory()->create();
    $this->actingAs($authUser);

    // The user we are going to chat with
    $chatUser = User::factory()->create();

    // Fake users returned from the ChatService
    $fakeUsers = User::factory()->count(2)->create();

    // Mock ChatService to return fake users
    $this->mock(ChatService::class, function ($mock) use ($fakeUsers) {
        $mock->shouldReceive('getOtherUsersWithUnreadCounts')
            ->once()
            ->andReturn($fakeUsers);
    });

    // Call the route
    $response = $this->get(route('chat', $chatUser));

    // Assertions
    $response->assertStatus(200);
    $response->assertViewIs('chat');
    $response->assertViewHas('user', $chatUser);
    $response->assertViewHas('users', $fakeUsers);
});
