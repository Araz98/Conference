<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'contact_no',
        'payment',
        'upload',
        'event',
        'online',
        'fees',
        'payed',
        'attendance'
    ];
    
}
