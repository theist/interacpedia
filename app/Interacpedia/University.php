<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class University extends Model {

    protected $fillable = [
        'name'
    ];
    /**
     * Get the challenges associated with this university
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

}
