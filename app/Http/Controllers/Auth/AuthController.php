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
        $user = Socialize::with( 'facebook' )->user();
        if ( $user )
        {
            $exists = User::where( 'email', '=', $user->getEmail() )->first();
            if ( $exists )
            {
                Auth::login( $exists );
                flash()->success( 'Succesfully logged in using your facebook account!' );

                return redirect()->intended( $this->redirectPath() );
            } else
            {
                $new = User::create( [
                    'name'   => $user->getName(),
                    'email'  => $user->getEmail(),
                    'avatar' => $user->getAvatar()
                ] );
                //dd($new);
                Auth::login( $new );
                flash()->success( 'New account created using your Facebook information.' );

                return redirect()->intended( $this->redirectPath() );
            }
        } else
        {
            flash()->error( 'Sorry, we didn\'t receive appropiate response from Facebook.' );

            return redirect( $this->loginPath() );
        }
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
        $user = Socialize::with( 'linkedin' )->user();
        if ( $user )
        {
            $exists = User::where( 'email', '=', $user->getEmail() )->first();
            if ( $exists )
            {
                Auth::login( $exists );
                flash()->success( 'Succesfully logged in using your LinkedIn account!' );
            } else
            {
                $new = User::create( [
                    'name'   => $user->getName(),
                    'email'  => $user->getEmail(),
                    'avatar' => $user->getAvatar()
                ] );
                Auth::login( $new );
                flash()->success( 'New account created using your LinkedIn information.' );
            }

            return redirect()->intended( $this->redirectPath() );

        } else
        {
            flash()->error( 'Sorry, we didn\'t receive appropiate response from LinkedIn.' );

            return redirect( $this->loginPath() );
        }
    }

    public function getTwitter()
    {
        return Socialize::with( 'twitter' )->redirect();
    }

    public function getTwitter2()
    {
        $user = Socialize::with( 'twitter' )->user();
        dd( $user );
        $exists = User::where( 'email', '=', $user->getEmail() )->first();
        if ( $exists )
        {
            Auth::login( $exists );
            flash()->success( 'Succesfully logged in using your Twitter account!' );

            return redirect()->intended( $this->redirectPath() );
        } else
        {
            flash()->error( 'Twitetr account not found on Interacpedia' );

            return redirect( $this->loginPath() );
        }
    }
}
