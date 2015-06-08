<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Career extends Model {

    protected $fillable = [
        'name'
    ];
    /**
     * Get the challenges associated with this career
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

}
