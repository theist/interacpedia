<?php namespace App\Interacpedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Occupation extends Model {

    protected $fillable = [
        'type'
    ];
    /**
     * Get possible values for enum field
     * @param string $field
     * @return array
     */
    public static function getValues($field = "type" )
    {
        return explode("','", substr(DB::select("SHOW COLUMNS FROM ".(new Occupation())->getTable()." LIKE '".$field."'")[0]->Type, 6, -2));
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function career()
    {
        return $this->belongsTo( 'App\Interacpedia\Career' );
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo( 'App\Interacpedia\University' );
    }
}
