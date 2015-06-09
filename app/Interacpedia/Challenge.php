<?php namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Challenge extends Model {

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
        'files'
    ];

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
        setlocale(LC_ALL, 'es_ES');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }

}
