<?php namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;


class CompleteProfile {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct( Guard $auth )
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        $response = $next( $request );
        if ( $this->auth->check() && $request->path() != 'user/completecategory'
            && $request->path() != 'user/completecity'
        )
        {
            $user = $this->auth->user();

            if ( !$user->category )
            {
                return new RedirectResponse( url( 'user/completecategory' ) );
            } else if ( !$user->birthdate || !$user->city )
            {
                return new RedirectResponse( url( 'user/completecity' ) );
            }
        }

        return $response;
    }

}
