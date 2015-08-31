<?php

namespace App\Http\Controllers;

use App\Interacpedia\Coordinator;
use App\Interacpedia\Mentor;
use App\Interacpedia\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    /**
     * Users report
     *
     * @param Request $request
     * @return Response
     */
    public function users(Request $request)
    {
        $types = ['Todos','Profesor','Mentor','Coordinador','Estudiante'];
        $type = $request->get('type',null);
        if($type !== null  && $types[$type] == 'Mentor')
        {
            $mentors = Mentor::all();
            $users = $mentors->map( function ( $item, $key )
            {
                return $item->user;
            } );
        } else if($type !== null  && $types[$type] == 'Coordinador'){
            $coordinators = Coordinator::all();
            $users = $coordinators->map( function ( $item, $key )
            {
                return $item->user;
            } );
        } else if($type !== null  && $types[$type] == 'Profesor'){
            $users = User::where('category','Professor')->get();
        } else if($type !== null  && $types[$type] == 'Estudiante'){
            $users = User::where('category','Student')->get();
        } else {
            $users = User::all();
        }
        $sorts = ['Nombre','Login'];
        $sort = $request->get('sort',0);
        if($sort !==null && $sorts[$sort] == "Nombre")
        {
            $users = $users->sortBy( 'name' );
        } else if($sort !==null && $sorts[$sort] == "Login"){
                $users = $users->sortByDesc(function ($user, $key){
                    return $user->lastLogin();
                });
        }

        return view('reports.users',compact('users','types','type','sorts','sort'));
    }

    /**
     * Get possible values for enum field
     * @param $table
     * @param string $field
     * @return array
     */
    public static function getValues($table, $field )
    {
        return explode("','", substr(DB::select("SHOW COLUMNS FROM ".$table." LIKE '".$field."'")[0]->Type, 6, -2));
    }

}
