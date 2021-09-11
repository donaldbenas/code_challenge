<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Customer;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\CustomerCollection
     */
    public function index()
    {
        return new CustomerCollection(Customer::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\CustomerResource
     */
    public function show($id)
    {
        return new CustomerResource(Customer::find($id));
    }
    
    /**
     * Create or update the resource from fetch data.
     *
     * @param  App\Models\Customer $customer
     * @return void
     */
    public function save(Customer $customer)
    {
        Customer::updateOrCreate(
            [
                'email'      => $customer->email 
            ],
            [
                'first_name' => $customer->first_name,
                'last_name'  => $customer->last_name,
                'username'   => $customer->username,
                'password'   => $customer->password,
                'gender'     => $customer->gender,
                'country'    => $customer->country,
                'city'       => $customer->city,
                'phone'      => $customer->phone
            ]
        );
    }
}
