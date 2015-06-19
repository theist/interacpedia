<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image',
        'images'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
