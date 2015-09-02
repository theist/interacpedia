<?php namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Lang;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable, Authorizable, CanResetPassword;

    protected $dates = [ 'birthdate', 'agree' ];
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
        return $this->hasMany( 'App\Interacpedia\Message', 'to_user' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany( 'App\Interacpedia\Notification' )->orderBy( 'created_at', 'desc' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentmessages()
    {
        return $this->hasMany( 'App\Interacpedia\Message', 'from_user' );
    }

    public function allmessages($items = 20)
    {
        $messages = Message::whereNull( 'message_id' )
            ->where(function ($query) {
                $query->where('to_user', $this->id)
                    ->orWhere('from_user', $this->id);
            })
            ->orderBy( 'created_at', 'desc' )
            ->paginate($items);
        //$received = $this->messages()->where('message_id', null)->orderBy('created_at', 'desc')->get();
        //$sent = $this->sentmessages()->where('message_id', null)->orderBy('created_at', 'desc')->get();
        return $messages;
    }

    public function unreadmessages()
    {
        $unread = Message::where( 'to_user', $this->id )->where( 'read', 0 )->count();

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
     * @return bool
     */
    public function inChallenge( $id )
    {
        $challenge = Challenge::findOrNew( $id );
        if ( $this->admin ) return true;
        foreach ( $challenge->coordinators as $coor )
        {
            if ( $coor->id == $this->id ) return true;
        }
        foreach ( $challenge->teams as $team )
        {
            foreach ( $team->users as $us )
            {
                if ( $us->id == $this->id ) return true;
            }
        }
        foreach ( $challenge->courses as $course )
        {
            if ( $course->user_id == $this->id ) return true;
            foreach ( $course->mentors as $mentor )
            {
                if ( $mentor->user_id == $this->id ) return true;
            }
        }

        return false;

    }

    /**
     * Get the teams associated with this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany( 'App\Interacpedia\Team' )->withTimestamps();
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
    public function mentors()
    {
        return $this->hasMany( 'App\Interacpedia\Mentor' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coordinators()
    {
        return $this->hasMany( 'App\Interacpedia\Coordinator' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany( 'App\Interacpedia\Course' );
    }

    /**
     * Get the courses associated with this student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany('App\Interacpedia\Course')->withTimestamps();
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
        $occ = Occupation::firstOrCreate( [ 'user_id' => $this->id ] );

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
        return $this->belongsToMany( 'App\Interacpedia\Tag' )->withTimestamps();
    }

    /**
     * Get all the groups associated with this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany( 'App\Interacpedia\Group' );
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

    public function lastLogin()
    {
        $stat = $this->stats()->where( 'action', 'login' )->orderBy( 'updated_at', 'desc' )->first();
        if ( $stat )
        {
            return $stat->updated_at->format( 'Y-m-d h:i' );
        } else if ( $this->agree )
        {
            return Carbon::parse( $this->agree )->format( 'Y-m-d h:i' );
        } else
        {
            return Lang::get( 'general/labels.never' );
        }
        //$date = $stat->updated_at;
        //if($date)
        //    return Carbon::parse( $date )->format( 'Y-m-d h:i' );
        //else
        //    return "";
    }

    public function perfil()
    {
        if ( $this->mentors()->count() )
            return "Mentor";
        else if ( $this->courses()->count() )
            return "Profesor";
        else if ( $this->coordinators()->count() )
            return "Coordinador";
        else if ( $this->teams()->count() )
            return "Estudiante";
        else
            return "Otro";
    }
}
