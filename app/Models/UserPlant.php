<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlant extends Model
{
    protected $table="plant_user";

    protected $fillable = ['user_id','plant_id','created_at','updated_at'];
}
