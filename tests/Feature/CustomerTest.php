<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A Test for customer list.
     *
     * @return void
     */
    public function test_customer_list()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
    }

    /**
     * A Test for customer show.
     *
     * @return void
     */
    public function test_customer_show()
    {
        $response = $this->get('/api/customers/1');

        $response->assertStatus(200);
    }
}
