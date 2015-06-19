<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

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
