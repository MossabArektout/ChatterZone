<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('order.{orderId}', function ($user, $orderId) {
    // Logic to determine if the user can listen to the channel
    return $user->id === Order::findOrNew($orderId)->user_id;
});

Broadcast::channel('chatchannel', function(){
    if (auth() -> check()) {
        return true;
    }
    return false;
});