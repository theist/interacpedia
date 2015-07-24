<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "OK";
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
	public function store(Request $request)
	{
        if (Input::hasFile('image'))
        {
            $file = Input::file( 'image' );
            $name = date( "Ymd-" ) . Input::file( 'image' )->getClientOriginalName();
            $dir = $request->header( 'upload_dir' );
            if ( !$dir ) $dir = "upload";
            $path = public_path() . "/images/" . $dir . "/";
            Input::file( 'image' )->move( $path, $name );
            //$image = imagestyle("/images/" . $dir . "/" . $name,'height150') ;
            $image = "/images/" . $dir . "/" . $name;
            return $image;
        } else if (Input::hasFile('avatar')) {
                $file = Input::file('avatar');
                $name = date("Ymd-") . Input::file('avatar')->getClientOriginalName();
                $dir = $request->header('upload_dir');
                if(!$dir)$dir = "upload";
                $path = public_path()."/images/".$dir . "/";
                Input::file('avatar')->move($path, $name);
                //$image = imagestyle("/images/" . $dir . "/" . $name,'height150') ;
                $image = "/images/" . $dir . "/" . $name;
                return $image;
        } else if (Input::hasFile('images')) {
            $files = Input::file('images');
            foreach($files as $file){
                $name = date("Ymd-") . $file->getClientOriginalName();
                $dir = $request->header('upload_dir');
                if(!$dir)$dir = "upload";
                $path = public_path()."/images/".$dir . "/";
                $file->move($path, $name);
                $image = "/images/" . $dir . "/" . $name;
                return $image;
            }
        } else if (Input::hasFile('files')) {
            $files = Input::file('files');
            foreach($files as $file){
                $name = date("Ymd-") . $file->getClientOriginalName();
                $dir = $request->header('upload_dir');
                if(!$dir)$dir = "upload";
                $path = public_path()."/images/".$dir . "/";
                $file->move($path, $name);
                $image = "/images/" . $dir . "/" . $name;
                return $image;
            }
        }
        return "";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
