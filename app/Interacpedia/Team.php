<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'challenge_id',
        'course_id'
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challenge()
    {
        return $this->belongsTo( 'App\Interacpedia\Challenge' );
    }
    /**
     * Get the users associated with this team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Interacpedia\User')->withTimestamps();
    }

}
