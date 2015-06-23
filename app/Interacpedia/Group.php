<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'model_id',
        'model_type',
        'private'
    ];

    /**
     * Get all of the owning models.
     */
    public function model()
    {
        return $this->morphTo();
    }
    /**
     * Get the users associated with this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Interacpedia\User')->withTimestamps();
    }

}
