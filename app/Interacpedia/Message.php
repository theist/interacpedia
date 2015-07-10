<?php

namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_user',
        'content',
        'title',
        'to_user',
        'message_id'
    ];
    /**
     * Returns formatted creation date
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute( $date )
    {
        setlocale(LC_ALL, 'es_ES');
        return Carbon::parse($date)->formatLocalized('%B %e, %G - %l:%M %p');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function message()
    {
        return $this->belongsTo( 'App\Interacpedia\Message');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from()
    {
        return $this->belongsTo( 'App\Interacpedia\User','from_user' );
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to()
    {
        return $this->belongsTo( 'App\Interacpedia\User','to_user' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return  $this->hasMany( 'App\Interacpedia\Message' );
    }
}
