<?php namespace App\Interacpedia;

use App\Services\Google;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $fillable = [
        'name'
    ];
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( 'App\Interacpedia\User' );
    }

    /**
     * Get the challenges associated with this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
    }

    /**
     * Get the challenges associated with this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Interacpedia\Challenge')->withTimestamps();
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
    public function getPosts(){
        $google = new Google();
        if($this->blogid)
            $posts =  $google->listPosts($this->blogid);
        else
            $posts =  $google->listPosts();
        return $posts;
    }
}
