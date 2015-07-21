<?php

namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
        'action',
        'value',
        'user_id',
        'model_id',
        'model_type'
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
     * Get all of the owning models.
     */
    public function model()
    {
        return $this->morphTo();
    }}
