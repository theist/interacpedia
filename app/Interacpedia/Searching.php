<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Searching extends Model {

    protected $fillable = [
        'name',
        'image'
    ];

    /**
     * Get the challenges associated with this searching
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }


}
