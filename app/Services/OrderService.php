<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OrderRepository $orderRepository) {}

    public function getAllOrders(?string $search)
    {
        $orders = $this->orderRepository->getAllOrders($search);

        return $orders;
    }

    public function getOrderByUserId(int $userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }

    public function getOrderItems(Order $order)
    {
        $orderItems = $this->orderRepository->getOrderItems($order);
        
        return $orderItems;
    }

}