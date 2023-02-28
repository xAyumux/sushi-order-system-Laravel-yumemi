<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public static function saveCustomer()
    {
        $customer = Customer::create();

        return $customer;
    }
}
