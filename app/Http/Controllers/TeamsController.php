<?php

namespace App\Http\Controllers;

use App\Interacpedia\Brief;
use App\Interacpedia\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Spatie\MediaLibrary\Media;

class TeamsController extends Controller
{
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
        $teams = Team::orderBy('id','asc')->get();
        $myteams = Auth::user()->teams;
        return view('teams.index',compact('teams','myteams'));
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
     * @param Team $team
     * @param  int $id
     * @param null $option
     * @return Response
     */
    public function show(Team $team, $id = null, $option = null)
    {
        if ( $id ) $team = Team::find( $id );
        if ( !$option ) $option = "info";
        if($option != "info" && Gate::denies('view-teamdetails', $team)){
            $option = "info";
        }
        $brief = Brief::firstOrCreate(['team_id'=>$team->id]);
        return view( 'teams.show', compact( 'team','option','brief' ) );
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

    public function delfile( $team, $file, Request $request )
    {
        $team = Team::find( $team );
        if($m = Media::find($file)){
            $m->delete();
            flash()->success( Lang::get( 'general/labels.file_deleted' ) );
        }
        return redirect( 'teams/'.$team->id . '/docs' );
    }

    public function addfile( $team, Request $request )
    {
        $team = Team::find( $team );
        if($request->file('document')){
            $team->addMedia($request->file('document'))->usingName($request->input('name'))->toCollection($request->input('type','others'));
            flash()->success( Lang::get( 'general/labels.file_uploaded' ) );
        }
        return redirect( 'teams/'.$team->id . '/docs' );
    }
}
