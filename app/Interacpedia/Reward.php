<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model {

    protected $fillable = [
        'name',
        'image'
    ];

    /**
     * Get the challenges associated with this reward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

}
