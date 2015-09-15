<?php

namespace App\Interacpedia\Teams;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'team_id',
        'team_description',
        'focus',
        'solution',
        'benefits',
        'validation',
        'analysis',
        'obstacles',
        'success',
        'activities',
        'resources',
        'social',
        'others',
        'sample'
    ];
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo( 'App\Interacpedia\Team' );
    }
    /**
     * @return bool
     */
    public function started()
    {
        if($this->title != "" || $this->team_description != "" || $this->focus != "" || $this->solution != "" || $this->benefits != ""
            || $this->validation != "" || $this->analysis != "" || $this->obstacles != "" || $this->success != "" || $this->activities != ""
            || $this->resources != "" || $this->social != "" || $this->others != "" || $this->sample != ""){
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function completed()
    {
        if($this->title =! "" && $this->team_description != "" && $this->focus != ""&& $this->solution != "" && $this->benefits != ""
            && $this->validation != "" && $this->analysis != "" && $this->obstacles != "" && $this->success != "" && $this->activities != ""
            && $this->resources != "" && $this->social != "" && $this->others != "" && $this->sample != ""){
            return true;
        }
        return false;
    }
}
