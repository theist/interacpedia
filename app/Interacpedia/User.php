<?php namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $dates = [ 'birthdate','agree' ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'category',
        'newsletter',
        'avatar',
        'birthdate',
        'city_id',
        'country_id',
        'vision',
        'admin',
        'agree'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany( 'App\Interacpedia\Comment' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return  $this->hasMany( 'App\Interacpedia\Message','to_user' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentmessages()
    {
        return  $this->hasMany( 'App\Interacpedia\Message','from_user' );
    }

    public function allmessages()
    {
        $messages = Message::where('from_user',$this->id)->orWhere('to_user',$this->id)->orderBy('created_at', 'desc')->get();
        //$received = $this->messages()->where('message_id', null)->orderBy('created_at', 'desc')->get();
        //$sent = $this->sentmessages()->where('message_id', null)->orderBy('created_at', 'desc')->get();
        return $messages;
    }

    public function unreadmessages(  )
    {
        $unread = Message::where('to_user',$this->id)->where('read',0)->count();
        return $unread;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany( 'App\Interacpedia\Like' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follows()
    {
        return $this->hasMany( 'App\Interacpedia\Follow' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function challenges()
    {
        return $this->hasMany( 'App\Interacpedia\Challenge' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany( 'App\Interacpedia\Course' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany( 'App\Interacpedia\Company' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany( 'App\Interacpedia\Project' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occupations()
    {
        return $this->hasMany( 'App\Interacpedia\Occupation' );
    }

    public function occupation()
    {
        $occ = Occupation::firstOrCreate(['user_id'=>$this->id]);
        //dd($occ);
        return $occ;
    }
    /**
     * Get all the tags associated with this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Interacpedia\Tag')->withTimestamps();
    }
    /**
     * Get all the groups associated with this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('App\Interacpedia\Group');
    }

    /**
     * @param $date
     */
    public function setBirthdateAttribute( $date )
    {
        $this->attributes[ 'birthdate' ] = Carbon::parse( $date );
    }

    public function getBirthdateAttribute( $date )
    {
        if ( $date )
        {
            return Carbon::parse( $date )->format( 'Y-m-d' );
        } else
        {
            return null;
        }
    }
    /**
     * @param $date
     */
    public function setAgreeAttribute( $date )
    {
        $this->attributes[ 'agree' ] = Carbon::parse( $date );
    }

    public function getAgreeAttribute( $date )
    {
        if ( $date )
        {
            return Carbon::parse( $date )->format( 'Y-m-d' );
        } else
        {
            return null;
        }
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo( 'App\Interacpedia\City' );
    }
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo( 'App\Interacpedia\Country' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stats()
    {
        return $this->hasMany( 'App\Interacpedia\Stat' );
    }

}
