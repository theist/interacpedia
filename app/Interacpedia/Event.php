<?php

namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Event extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at','start','end'];

    protected $fillable = [
        'title',
        'description',
        'location',
        'start',
        'end',
        'min_users',
        'status'
    ];

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
    public function getStartAttribute( $date )
    {
        setlocale(LC_ALL, 'es');
        Carbon::setLocale('es');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }
    public function getEndAttribute( $date )
    {
        setlocale(LC_ALL, 'es');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }
}
