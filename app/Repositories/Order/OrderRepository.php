<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Repository;

class OrderRepository extends Repository implements IOrderRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function getByCustomerCode(string $code) {
        return $this->model->where('customer_code', '=', $code)->get();
    }
}
