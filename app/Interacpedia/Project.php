<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id'
    ];

}
