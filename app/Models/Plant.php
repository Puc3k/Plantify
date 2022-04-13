<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Plant extends Model
{
    protected $fillable =[
        'name','latinName','position','soil','watering','humidity'
    ];

}
