<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interacpedia\Partner;
use App\Interacpedia\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Segment;

class PagesController extends Controller {

    /**
     * Show the application homepage to the user.
     *
     * @return Response
     */
    public function index()
    {
        //if( $user = Auth::user() ){
        //    Segment::identify( [
        //        "userId" => $user->id,
        //        "traits" => [
        //            "name"  => $user->name,
        //            "email" => $user->email,
        //        ]
        //    ] );
        //    Segment::page([
        //        "userId" => $user->id,
        //        "category" => "General",
        //        "name"=>"Home",
        //        "properties" => [ ]
        //    ]);
        //} else {
        //    Segment::page([
        //        "anonymousId" => "",
        //        "category" => "General",
        //        "name"=>"Home",
        //        "properties" => [ ]
        //    ]);
        //
        //}
        $stories = Story::latest()->take(2)->get();
        $partners = Partner::latest()->take(4)->get();
        return view('home', compact('stories','partners'));
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
