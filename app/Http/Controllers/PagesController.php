<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    /**
     * Show the application homepage to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return string
     */
    public function terms()
    {
        return "Terms and Conditions";
    }

    /**
     * @return string
     */
    public function privacy()
    {
        return "Privacy Policy";
    }


}
