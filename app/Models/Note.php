<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'decsription',
        'date',
    ];

    protected $dates = ['date'];


    public function plants()
    {
        return $this->belongsTo(Plant::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);

    }
}
