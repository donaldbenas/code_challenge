<?php

namespace App\Library;

use App\Library\Contracts\CustomerServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CustomerService implements CustomerServiceInterface
{
    /**
     * Url path of the api
     * 
     * @var string
     * */ 
    protected $url = 'https://randomuser.me/api/';

    /**
     * Country code that
     * 
     * @var string
     * */ 
    protected $country = 'au';

    /**
     * {@inheritdoc}
     */
    public function fetch($count = 100)
    {
        $response = Http::get($this->url, [
            'results' => $count,
            'nat'     => $this->country,
        ]);

        if ($response->successful())
        {
            return $this->parseData($response->json());
        }
        return []; 
    }
    
    /**
     * {@inheritdoc}
     */
    public function parseData($json)
    {
        $results = [];
        foreach ($json['results'] as $row)
        {
            $results[] = [
                'first_name' => $row['name']['first'],
                'last_name'  => $row['name']['last'],
                'email'      => $row['email'],
                'username'   => $row['login']['username'],
                'password'   => md5($row['login']['password']),
                'gender'     => $row['gender'],
                'country'    => $row['location']['country'],
                'city'       => $row['location']['city'],
                'phone'      => $row['phone']
            ];
        }
        return $results;
    }
}
