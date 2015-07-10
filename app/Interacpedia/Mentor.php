<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'name',
        'image',
        'achievements',
        'experience',
        'education',
        'location',
        'profile',
        'user_id'
    ];
    /**
     * Get all of the Mentor follows.
     */
    public function follows()
    {
        return $this->morphMany('App\Interacpedia\Follow', 'model');
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( 'App\Interacpedia\User' );
    }


}
