<?php

namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'model_id',
        'model_type'
    ];

    /**
     * Returns formatted creation date
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute( $date )
    {
        setlocale(LC_ALL, 'es_ES');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
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
     * Get all of the owning models.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
