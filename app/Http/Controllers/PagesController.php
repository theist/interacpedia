<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactFormRequest;
use App\Interacpedia\Challenge;
use App\Interacpedia\Partner;
use App\Interacpedia\Story;
use App\Services\Google;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
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
        $posts =  $google->listPosts("5935318404281787196",3);
        $stories = Story::latest()->take(2)->get();
        $partners = Partner::latest()->take(20)->get();
        $challenges = Challenge::latest()->take(4)->get();
        return view('home', compact('stories','partners','user','posts','challenges'));
    }

    public function brief()
    {
        $this->middleware( 'auth' );
        return view('pages.brief');
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
    /**
     * @return string
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * @param ContactFormRequest $request
     * @return string
     */
    public function contact_store(ContactFormRequest $request)
    {
        Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('info@interacpedia.com');
                $message->to('info@interacpedia.com', 'Interacpedia Info')->cc('jcorrego@gmail.com')->subject('Interacpedia - Contacto');
            });
        flash()->success( 'Gracias por contactarnos!' );
        return \Redirect::route('contact')->with('message', 'Gracias por contactarnos!');

    }
}
