<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\City;
use App\Interacpedia\Country;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function show( Authenticatable $user )
    {
        return $user;
    }

    /**
     * Displays a user profile
     *
     * @param Authenticatable $user
     * @return Authenticatable
     */
    public function profile( Authenticatable $user )
    {
        return view( 'user.profile', compact( 'user' ) );
    }

    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completecategory( Authenticatable $user )
    {
        return view( 'user.completecategory', compact( 'user' ) );
    }

    /**
     * @param Authenticatable $user
     * @return \Illuminate\View\View
     */
    public function completecity( Authenticatable $user )
    {
        $cities = City::lists( 'name', 'id' );
        $countries = Country::lists( 'name', 'id' );

        return view( 'user.completecity', compact( 'user', 'cities', 'countries' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Authenticatable $user
     * @param Request $request
     * @return Response
     */
    public function update( Authenticatable $user, Request $request )
    {
        //dd($request);
        $user->update( $request->all() );
        if ( $request->input( 'completecategory', false ) )
            return redirect( 'user/completecity' );

        return redirect( 'user/profile' );
    }
}
