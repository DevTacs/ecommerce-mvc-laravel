<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function getOrderByUserId(int $userId)
    {
        $orders = Order::where('user_id', $userId)
            ->latest()
            ->paginate(10);
            
        return $orders;
    }
}