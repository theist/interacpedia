<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interacpedia\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Socialize;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct( Guard $auth, Registrar $registrar )
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware( 'guest', [ 'except' => 'getLogout' ] );
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return Socialize::with( 'facebook' )->redirect();
    }

    public function getFacebook2()
    {
        return $this->sociallogin( 'facebook', 'Facebook' );
    }

    public function getGoogle()
    {
        return Socialize::with( 'google' )->redirect();
    }

    /**
     * Gets user information from LinkedIn and logins or creates the local users.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getGoogle2()
    {
        return $this->sociallogin( 'google', 'Google+' );
    }

    public function getLinkedin()
    {
        return Socialize::with( 'linkedin' )->redirect();
    }

    /**
     * Gets user information from LinkedIn and logins or creates the local users.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLinkedin2()
    {
        return $this->sociallogin( 'linkedin', 'LinkedIn' );
    }

    public function getTwitter()
    {
        return Socialize::with( 'twitter' )->redirect();
    }

    public function getTwitter2()
    {
        return $this->sociallogin( 'twitter', 'Twitter' );
        // Email not working: https://twittercommunity.com/t/twitter-oauth-after-connect-get-primary-email-address/1563/49
    }

    public function sociallogin( $provider, $name )
    {
        $user = Socialize::with( $provider )->user();
        if ( $user && $user->getEmail() )
        {
            $exists = User::where( 'email', '=', $user->getEmail() )->first();
            if ( $exists )
            {
                if ( $exists->avatar == "" )
                {
                    $exists->avatar = $user->getAvatar();
                    $exists->save();
                    flash()->success( 'Avatar updated from your ' . $name . ' account!' );
                }
                Auth::login( $exists );
                flash()->success( 'Succesfully logged in using your ' . $name . ' account!' );
            } else
            {
                //$new = User::create( [
                //    'name'   => $user->getName(),
                //    'email'  => $user->getEmail(),
                //    'avatar' => $user->getAvatar()
                //] );
                //Auth::login( $new );
                flash()->warning( Lang::get('auth/messages.sorry_invitation') );
            }
            return redirect()->intended( $this->redirectPath() );

        } else
        {
            flash()->error( 'Sorry, we didn\'t receive appropiate response from '.$name.'.' );

            return redirect( $this->loginPath() );
        }

    }
}
