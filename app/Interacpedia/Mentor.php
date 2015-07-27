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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
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

    /**
     * Get the courses associated with this mentor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany('App\Interacpedia\Course')->withTimestamps();
    }



}
