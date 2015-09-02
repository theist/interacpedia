<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Team extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name',
        'challenge_id',
        'course_id'
    ];

    public function brief()
    {
        return Brief::firstOrCreate(['team_id'=>$this->id]);
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo( 'App\Interacpedia\Course' );
    }
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
    /**
     * Get all of the challenge likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Interacpedia\Like', 'model');
    }
    /**
     * Get all of the challenge follows.
     */
    public function follows()
    {
        return $this->morphMany('App\Interacpedia\Follow', 'model');
    }
    /**
     * Get all of the challenge comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Interacpedia\Comment', 'model')->orderBy('created_at', 'desc');
    }

}
