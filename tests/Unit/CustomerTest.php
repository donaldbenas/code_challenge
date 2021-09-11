<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;

use App\Library\CustomerService;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_customer_import()
    {
        $data = [
            'first_name' => 'Stacey',
            'last_name'  => 'Johnston',
            'email'      => 'stacey.johnston@example.com',
            'username'   => 'sadladybug171',
            'password'   => md5('password123'),
            'gender'     => 'female',
            'country'    => 'Australia',
            'city'       => 'Pert',
            'phone'      => '08-5513-0676'
        ];

        $mock = Mockery::mock(CustomerService::class);
        $mock->shouldReceive('fetch')
            ->with(1)
            ->andReturn([$data]);

        $customer = $mock->fetch(1)[0];
            
        $customerModel = new Customer();
        $customerController = new CustomerController();
        $customerController->save($customerModel->fill($customer));

        $this->assertDatabaseHas('customers', ['email' => 'stacey.johnston@example.com']);
    }
}
