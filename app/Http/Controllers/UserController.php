<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('user.profile',compact('user'));
    }

    public function completecategory( Authenticatable $user )
    {
        return view( 'user.completecategory', compact('user') );
    }

    public function completecity( Authenticatable $user )
    {
        $cities = ['Undefined','Bogotá D.C.', 'Medellín','Cali'];
        return view( 'user.completecity', compact('user','cities') );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Authenticatable $user
     * @param Request $request
     * @return Response
     */
    public function update( Authenticatable $user, Request $request  )
    {
        $user->update($request->all());
        return redirect('user/profile');
    }
}
