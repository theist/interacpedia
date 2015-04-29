<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Displays a user profile
     *
     * @param Authenticatable $user
     * @return Authenticatable
     */
    public function profile(Authenticatable $user)
    {
        return $user;
	}

}
