<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Order $order){
        if ($order->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function payment(User $user, Order $order){
        if ($order->status == 1) {
            return true;
        }else{
            return false;
        }
    }
}
