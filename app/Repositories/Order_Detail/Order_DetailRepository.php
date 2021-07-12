<?php

namespace App\Repositories\Order_Detail;

use App\Models\Order_Detail;
use App\Repositories\Repository;

class Order_DetailRepository extends Repository implements IOrder_DetailRepository
{
    public function __construct(Order_Detail $model)
    {
        parent::__construct($model);
    }

}
