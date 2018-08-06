<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $table = 'vols';

    protected $fillable = [
        'id', 'destination', 'depart', 'arrive'
    ];
}
