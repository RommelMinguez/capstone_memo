<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chatify.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('presence-chatify', function ($user) {
    return ['id' => $user->id, 'name' => $user->first_name . ' ' . $user->last_name];
});

Broadcast::channel('private-chatify', function ($user) {
    return $user;
});

Broadcast::channel('chatify.{id}', function ($user, $id) {
    \Log::info('Channel Auth Request', [
        'user_id' => $user->id,
        'requested_id' => $id
    ]);
    return (int) $user->id === (int) $id;
});

