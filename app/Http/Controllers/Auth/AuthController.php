<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interacpedia\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Segment;

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
     */
    public function __construct()
    {
        $this->middleware( 'guest', [ 'except' => 'getLogout' ] );
    }

    public function getLogout()
    {
        $user = Auth::user();
        Segment::identify( [
            "userId" => $user->id,
            "traits" => [
                "name"  => $user->name,
                "email" => $user->email,
            ]
        ] );

        Segment::track( [
            "userId"     => $user->id,
            "event"      => "Logged Out",
            "properties" => [
            ]
        ] );

        Auth::logout();
        flash()->success( Lang::get( 'auth/messages.logout_ok') );
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator( array $data )
    {
        return Validator::make( $data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users|confirmed',
            'password' => 'required|confirmed|min:6',
            'category' => 'required',
        ] );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create( array $data )
    {
        return User::create( [
            'name'       => $data[ 'name' ],
            'email'      => $data[ 'email' ],
            'category'   => $data[ 'category' ],
            'newsletter' => isset( $data[ 'newsletter' ] ) ? 1 : 0,
            'password'   => bcrypt( $data[ 'password' ] ),
        ] );
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return Socialite::driver( 'facebook' )->redirect();
    }

    public function getFacebook2()
    {
        return $this->sociallogin( 'facebook', 'Facebook' );
    }

    public function getGoogle()
    {
        return Socialite::driver( 'google' )->redirect();
    }

    public function getGoogle2()
    {
        return $this->sociallogin( 'google', 'Google+' );
    }

    public function getLinkedin()
    {
        return Socialite::driver( 'linkedin' )->redirect();
    }

    public function getLinkedin2()
    {
        return $this->sociallogin( 'linkedin', 'LinkedIn' );
    }

    public function getTwitter()
    {
        return Socialite::driver( 'twitter' )->redirect();
    }

    public function getTwitter2()
    {
        return $this->sociallogin( 'twitter', 'Twitter' );
        // Email not working: https://twittercommunity.com/t/twitter-oauth-after-connect-get-primary-email-address/1563/49
    }

    public function sociallogin( $provider, $name )
    {
        $user = Socialite::driver( $provider )->user();
        if ( $user && $user->getEmail() )
        {
            $exists = User::where( 'email', '=', $user->getEmail() )->first();
            if ( $exists )
            {
                if ( $exists->avatar == "" )
                {
                    $exists->avatar = $user->getAvatar();
                    $exists->save();
                    flash()->success( Lang::get( 'auth/messages.avatar_updated', [ 'name' => $name ] ) );
                }
                Auth::login( $exists );

                Segment::identify( [
                    "userId" => $exists->id,
                    "traits" => [
                        "name"  => $exists->name,
                        "email" => $exists->email,
                    ]
                ] );

                Segment::track( [
                    "userId"     => $exists->id,
                    "event"      => "Logged In",
                    "properties" => [
                        "social" => true,
                        "source" => $name
                    ]
                ] );
                flash()->success( Lang::get( 'auth/messages.login_ok', [ 'name' => $name ] ) );
            } else
            {
                //$new = User::create( [
                //    'name'   => $user->getName(),
                //    'email'  => $user->getEmail(),
                //    'avatar' => $user->getAvatar()
                //] );
                //Auth::login( $new );
                flash()->error( Lang::get( 'auth/messages.sorry_invitation' ) );

                return redirect( $this->loginPath() );
            }

            return redirect()->intended( $this->redirectPath() );

        } else
        {
            flash()->error( Lang::get( 'auth/messages.social_error', [ 'name' => $name ] ) );

            return redirect( $this->loginPath() );
        }

    }
}
