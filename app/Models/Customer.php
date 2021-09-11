<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'username', 'password', 'gender', 'country', 'city', 'phone'];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
