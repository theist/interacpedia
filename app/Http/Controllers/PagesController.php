<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\Partner;
use App\Interacpedia\Story;
use App\Services\Google;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Segment;

class PagesController extends Controller {

    /**
     * Show the application homepage to the user.
     *
     * @param Google $google
     * @return Response
     */
    public function index(Google $google)
    {
        $posts =  $google->listPosts();
        $stories = Story::latest()->take(2)->get();
        $partners = Partner::latest()->take(4)->get();

        return view('home', compact('stories','partners','user','posts'));
    }

    /**
     * @return string
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * @return string
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
    /**
     * @return string
     */
    public function howitworks()
    {
        return view('pages.howitworks');
    }

    /**
     * @return string
     */
    public function about()
    {
        return view('pages.about');
    }

}
