<?php

namespace App\Enums\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}