<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Library\CustomerService;
use App\Library\Contracts\CustomerServiceInterface;

class ImportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
    }
}
