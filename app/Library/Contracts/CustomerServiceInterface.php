<?php

namespace App\Library\Contracts;

interface CustomerServiceInterface
{
    /**
     * Fetch a customer from randomuser.me api.
     *
     * @param  integer $count   Number of result that would return.
     * @return array
     */
    public function fetch($count);    

    /**
     * Parse JSON data from api response.
     *
     * @param  array $json      JSON of data from api.
     * @return void
     */
    public function parseData($json);
}
