<?php

namespace App\Repositories\Customer;

use App\Repositories\IRepository;

interface ICustomerRepository extends IRepository
{
    public function getByName(string $name);
}
