<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
