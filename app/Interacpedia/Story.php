<?php namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Story extends Model {

    protected $fillable = [
        'title',
        'summary',
        'image',
        'published'
    ];

    protected $dates = ['published'];

    public function scopeFeatured( $query )
    {
        $query->where('published','<=',Carbon::now());
    }

    public function setPublishedAttribute( $date )
    {
        $this->attributes['published'] = Carbon::parse($date);
    }

    public function getPublishedAttribute( $date )
    {
        setlocale(LC_ALL, 'es_ES');
        return Carbon::parse($date)->formatLocalized('%B %e, %G');
    }


}
