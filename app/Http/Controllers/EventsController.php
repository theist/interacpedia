<?php

namespace App\Http\Controllers;

use App\Interacpedia\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Spatie\MediaLibrary\Media;

class EventsController extends Controller
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $finished = Event::where('status','finished')->orderBy('start','desc')->get();
        $open = Event::where('status','open')->orderBy('start','desc')->get();
        //$events = Event::orderBy('start','desc')->get();
        return view('events.index',compact('open','finished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @param  int $id
     * @param null $option
     * @return Response
     */
    public function show(Event $event, $id = null, $option = null)
    {
        if ( $id ) $event = Event::find( $id );
        if ( !$option ) $option = "info";
        if($option != "info" && Gate::denies('view-eventdetails', $event)){
            $option = "info";
        }
        return view( 'events.show', compact( 'event','option' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function adduser( $event, Request $request )
    {
        $event = Event::find( $event );
        $event->users()->detach(Auth::user()->id);
        $event->users()->attach(Auth::user()->id);
        flash()->success( 'Usuario agregado al evento!' );
        return redirect( 'events/'.$event->id . '/info' );
    }
    public function deluser( $event, Request $request )
    {
        $event = Event::find( $event );
        $event->users()->detach(Auth::user()->id);
        flash()->success( 'Usuario eliminado del evento!' );
        return redirect( 'events/'.$event->id . '/info' );
    }
    public function addfile( $event, Request $request )
    {
        $event = Event::find( $event );
        if($request->file('image')){
            $media = $event->addMedia($request->file('image'))->usingName($request->input('name'))->toCollection($request->input('type','gallery'));
            //NotificationsController::add($media);
            flash()->success( Lang::get( 'general/labels.image_uploaded' ) );
        }
        return redirect( 'events/'.$event->id . '/gallery' );
    }
    public function delfile( $event, $file, Request $request )
    {
        $event = Event::find( $event );
        if($m = Media::find($file)){
            $m->delete();
            flash()->success( Lang::get( 'general/labels.file_deleted' ) );
        }
        return redirect( 'events/'.$event->id . '/gallery' );
    }
}
