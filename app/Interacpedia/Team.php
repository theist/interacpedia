<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Team extends Model implements HasMedia
{
    use HasMediaTrait;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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

    /**
     * @return bool
     */
    public function team_on()
    {
        foreach($this->users as $us){
            if(!$us->agree)
                return false;
        }
        return true;
    }
    /**
     * @return bool
     */
    public function perfil_ok()
    {
        foreach($this->users as $us){
            if(!$us->completed())
                return false;
        }
        return true;
    }
    /**
     * @return bool
     */
    public function challenge_comments()
    {
        foreach($this->users as $us){
            foreach($us->comments as $comment){
                if($comment->model_type == "App\\Interacpedia\\Challenge"
                      && $comment->model_id == $this->challenge->id  ){
                    return true;
                }
            }
        }
        return false;
    }

}
