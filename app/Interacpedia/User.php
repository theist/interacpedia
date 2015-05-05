<?php namespace App\Interacpedia;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $dates = ['birthdate'];
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
        'city'
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
    public function challenges()
    {
        return $this->hasMany( 'App\Interacpedia\Challenge' );
    }

    public function setBirthdateAttribute( $date )
    {
        $this->attributes['birthdate'] = Carbon::parse($date);
    }

    public function getBirthdateAttribute( $date )
    {
        if($date){
            return Carbon::parse($date)->format('Y-m-d');
        } else{
            return null;
        }

    }

}
