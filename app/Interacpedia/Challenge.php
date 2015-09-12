<?php namespace App\Interacpedia;

use App\Services\Google;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Challenge extends Model implements HasMedia {

    use SoftDeletes;
    use HasMediaTrait;

    protected $fillable = [
        'name',
        'description',
        'solution',
        'benefits',
        'image',
        'images',
        'user_id',
        'type_id',
        'category_id',
        'actual_stage',
        'desired_stage',
        'website',
        'video',
        'files',
        'partner_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at','updated_at','deleted_at'];

    /**
     * Get possible values for enum field
     * @param string $field
     * @return array
     */
    public static function getValues($field = "actual_stage" )
    {
        return explode("','", substr(DB::select("SHOW COLUMNS FROM ".(new Challenge())->getTable()." LIKE '".$field."'")[0]->Type, 6, -2));
    }
    /**
     * Get the rewards associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rewards()
    {
        return $this->belongsToMany( 'App\Interacpedia\Reward' )->withTimestamps();
    }

    /**
     * Get the universities associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function universities()
    {
        return $this->belongsToMany( 'App\Interacpedia\University' )->withTimestamps();
    }
    /**
     * Get the careers associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function careers()
    {
        return $this->belongsToMany( 'App\Interacpedia\Career' )->withTimestamps();
    }
    /**
     * Get the courses associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany( 'App\Interacpedia\Course' )->withTimestamps();
    }

    /**
     * Get the searchings associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function searchings()
    {
        return $this->belongsToMany( 'App\Interacpedia\Searching' )->withTimestamps();
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo( 'App\Interacpedia\Partner' );
    }

    /**
     * Get the teams associated with this challenge
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany( 'App\Interacpedia\Team' );
    }

    /**
     * Get the coordinators associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coordinators()
    {
        return $this->belongsToMany('App\Interacpedia\Coordinator')->withTimestamps();
    }
    /**
     * Get the creators associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function creators()
    {
        return $this->belongsToMany('App\Interacpedia\User')->withTimestamps();
    }

    /**
     * Get the tags associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Interacpedia\Tag')->withTimestamps();
    }

    public function type()
    {
        return $this->belongsTo( 'App\Interacpedia\ChallengeType' );
    }
    public function category()
    {
        return $this->belongsTo( 'App\Interacpedia\ChallengeCategory' );
    }

    public function getCreatedAtAttribute( $date )
    {
        setlocale(LC_ALL, 'es');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }
    public function getUpdatedAtAttribute( $date )
    {
        setlocale(LC_ALL, 'es');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }


    /**
     * Get all of the challenge comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Interacpedia\Comment', 'model')->orderBy('created_at', 'desc');
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
     * Get all of the challenge groups.
     */
    public function groups()
    {
        return $this->morphMany('App\Interacpedia\Group', 'model')->orderBy('name', 'asc');
    }

    public function getPosts(){
        $google = new Google();
        $posts =  $google->listPosts();
        return $posts;
    }
    /**
     * Get all of the challenge follows.
     */
    public function stats()
    {
        return $this->morphMany('App\Interacpedia\Stat', 'model');
    }

}

