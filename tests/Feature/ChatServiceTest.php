<?php

//Command: ./vendor/bin/pest tests/Feature/ChatServiceTest.php


use App\Models\User;
use App\Models\ChatMessages;
use App\Services\ChatService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);



test('can create a chat message', function () {
    $message = ChatMessages::factory()->create();

    expect($message)->toBeInstanceOf(ChatMessages::class);
    expect($message->text)->not->toBeEmpty();
});


test('can create an unread message', function () {
    $unread = ChatMessages::factory()->unread()->create();

    expect($unread->is_read)->toBeFalse();
});



# Get Other Users with Unread Counts
test('getOtherUsersWithUnreadCounts returns users with unread count', function () {
    $authUser = User::factory()->create();

    $otherUser = User::factory()->create();

    ChatMessages::factory()->count(3)->create([
        'sender_id' => $otherUser->id,
        'receiver_id' => $authUser->id,
        'is_read' => false,
    ]);

    Auth::login($authUser);

    $service = new ChatService();

    $users = $service->getOtherUsersWithUnreadCounts();

    expect($users)->toHaveCount(1);
    expect($users->first()->unread_count)->toBe(3);
});



# getConversationWith marks messages as read

test('getConversationWith marks messages as read and returns them', function () {
    $authUser = User::factory()->create();
    $otherUser = User::factory()->create();

    ChatMessages::factory()->create([
        'sender_id' => $otherUser->id,
        'receiver_id' => $authUser->id,
        'text' => 'Hi!',
        'is_read' => false,
    ]);

    Auth::login($authUser);

    $service = new ChatService();
    $messages = $service->getConversationWith($otherUser);

    expect($messages)->toHaveCount(1);
    expect($messages->first()->is_read)->toBeTrue();
});


# sendMessageTo creates a message

test('sendMessageTo creates and returns a new message', function () {
    $authUser = User::factory()->create();
    $receiver = User::factory()->create();

    // Auth::login($authUser);
    $this->actingAs($authUser);

    $service = new ChatService();
    $message = $service->sendMessageTo($receiver, 'Hello!');
    expect($message)->not->toBeNull();
    expect($message->sender_id)->toBe($authUser->id);
    expect($message->receiver_id)->toBe($receiver->id);
    expect($message->text)->toBe('Hello!');
    expect($message->is_read)->toBeFalse();
});



