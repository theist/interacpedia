<?php

namespace App\Http\Controllers;

use App\Interacpedia\Course;
use App\Interacpedia\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CoursesController extends Controller
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
        $courses = Course::where('name','<>','Todos')->where('hashtag','<>','')->get();
        return view('courses.index',compact('courses'));
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
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param  int $id
     * @param null $option
     * @return Response
     */
    public function show( Course $course, $id = null, $option = null )
    {
        if ( $id ) $course = Course::find( $id );
        $user = $course->user()->getResults();
        if ( !$option ) $option = "info";
        if($option != "info" && Gate::denies('view-coursedetails', $course)){
            $option = "info";
        }


        /* TO DO: move this relations into one object with properties.
         * */
        $challenges = $course->challenges;

        foreach($challenges as $challenge){
            $team = Team::firstOrCreate(['course_id'=>$course->id,'challenge_id'=>$challenge->id]);
            $team->name = "Equipo";
            //$team->save();

        }
        $teams = $course->teams()->get();
        $students = $course->students()->orderBy('name')->get();

        if ( Auth::check() )
        {
            return view( 'courses.show', compact( 'course', 'user', 'option','challenges','students','teams' ) );
        } else
        {
            return view( 'courses.showbrief', compact( 'course', 'user' ) );
        }

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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
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
}
