<?php namespace App\Interacpedia;

use App\Services\Google;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( 'App\Interacpedia\User' );
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo( 'App\Interacpedia\University' );
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
    public function students()
    {
        return $this->belongsToMany('App\Interacpedia\User')->withTimestamps();
    }

    /**
     * Get the mentors associated with this course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mentors()
    {
        return $this->belongsToMany('App\Interacpedia\Mentor')->withTimestamps();
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
    public function blogUrl(  )
    {
        $google = new Google();
        if($this->blogid){
            return $google->blogUrl($this->blogid);
        }
        return false;
    }

    public function blogPageviews(  )
    {
        $google = new Google();
        if($this->blogid){
            return $google->pageViews($this->blogid);
        }
        return 0;
    }
    /**
     * @return \Google_Service_Blogger_PostList
     */
    public function getPosts(){
        $google = new Google();
        if($this->blogid)
            $posts =  $google->listPosts($this->blogid);
        else
            $posts =  $google->listPosts();
        return $posts;
    }

}
