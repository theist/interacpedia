<?php

namespace App\Http\Controllers;

use App\Interacpedia\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = Course::where('name','<>','Todos')->get();
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
     * @param  int  $id
     * @return Response
     */
    public function show( Course $course, $id = null, $option = null )
    {
        if ( $id ) $course = Course::find( $id );
        $user = $course->user()->getResults();
        if ( !$option ) $option = "info";
        /* TO DO: move this relations into one object with properties.
         * */
        $challenges = $course->challenges();
        $students = $course->students();
        //dd($challenges);
        if ( Auth::check() )
        {
            return view( 'courses.show', compact( 'course', 'user', 'option','challenges','students' ) );
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
