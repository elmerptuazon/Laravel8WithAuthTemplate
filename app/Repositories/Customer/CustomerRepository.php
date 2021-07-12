<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\Repository;

class CustomerRepository extends Repository implements ICustomerRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function getByName(string $name) {
        return $this->model->where('name', '=', $name)->first();
    }
}
