<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $fillable = [
        'name'
    ];
    /**
     * Get the challenges associated with this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

}
