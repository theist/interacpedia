<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $fillable = [
        'name',
        'team_id',
        'problem',
        'solution',
        'benefits',
        'analysis',
        'obstacles',
        'success',
        'keys',
        'others'
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
        if($this->problem != "" || $this->solution != "" || $this->benefits != ""
        || $this->analysis != "" || $this->obstacles != "" || $this->success != ""
        || $this->keys != "" || $this->others != ""){
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function completed()
    {
        if($this->problem != "" && $this->solution != "" && $this->benefits != ""
            && $this->analysis != "" && $this->obstacles != "" && $this->success != ""
            && $this->keys != "" && $this->others != ""){
            return true;
        }
        return false;
    }
}
