<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OrderRepository $orderRepository) {}

    public function getOrderByUserId(int $userId)
    {
        return $this->orderRepository->getOrderByUserId($userId);
    }

}