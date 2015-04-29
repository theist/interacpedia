<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model {

    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    /**
     * Get the rewards associated with this challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rewards()
    {
        return $this->belongsToMany('App\Interacpedia\Reward')->withTimestamps();
    }

    /**
     * Gets rewards ids
     *
     * @return mixed
     */
    public function getRewardListAttribute()
    {
        return $this->rewards->lists('id');
    }
}
