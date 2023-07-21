<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'Firstname',
        'Lastname',
        'DateOfBirth',
        'PhoneNumber',
        'Email',
        'BankAccountNumber',
    ];

}
