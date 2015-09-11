<?php

namespace App\Http\Controllers;

use App\Interacpedia\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

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
        $events = Event::all();
        return view('events.index',compact('events'));
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
}
