<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function getAllOrders(?string $search)
    {
        $query = Order::query();

        if($search) {
            $query->where('order_number', 'like', '%' . $search . '%');
        }

        return $query->paginate(10);
    }
    
    public function getOrderByUserId(int $userId)
    {
        $orders = Order::where('user_id', $userId)
            ->latest()
            ->paginate(10);
            
        return $orders;
    }

    public function getOrderItems(Order $order)
    {
        $orderItems = $order->orderItems()->paginate(10);
        return $orderItems;
    }
}