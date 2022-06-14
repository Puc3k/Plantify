<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Plant extends Model
{
    protected $fillable =[
        'name','latinName','position','soil','watering','humidity'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'note_plant_user')->withPivot('note_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
