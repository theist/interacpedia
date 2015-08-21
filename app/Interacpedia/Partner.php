<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'logo',
        'description',
        'origin',
        'type',
        'sector',
        'website',
        'slogan'
    ];
    /**
     * Get all of the Partner follows.
     */
    public function follows()
    {
        return $this->morphMany('App\Interacpedia\Follow', 'model');
    }

}
