<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Library\CustomerService;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customer {--count=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from https://randomuser.me';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customerService = new CustomerService();
        $customers = $customerService->fetch($this->option('count'));

        $customerController = new CustomerController();
        foreach ($customers as $customer)
        {
            $customerModel = new Customer();
            $customerModel->fill($customer);
            $customerController->save($customerModel->fill($customer));
        }
    }
}
