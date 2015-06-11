<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = [
        'name',
        'type'
    ];

    /**
     * Get the challenges associated with this tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

}
