<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class NotePlantUser extends Pivot
{
    protected $table="note_plant_user";

    protected $fillable = ['user_id','plant_id','note_id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'note_plant_user');
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class,'note_plant_user');
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class,'note_plant_user');
    }
}
