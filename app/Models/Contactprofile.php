<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactprofile extends Model
{
    use HasFactory;

    protected $Fillable=[
        'address',
        'email',
        'phoneno'
    ];

}
