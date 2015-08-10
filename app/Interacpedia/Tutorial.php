<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

}
