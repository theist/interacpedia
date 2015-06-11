<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Interacpedia\City;
use App\Interacpedia\Company;
use App\Interacpedia\Country;
use App\Interacpedia\Sector;
use App\Interacpedia\Tag;
use App\Interacpedia\User;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller {

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * @param Company $company
     * @return \Illuminate\View\View
     */
    public function show( Company $company )
    {
        $option = 'about';

        return view( 'companies.profile', compact( 'company', 'option' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\View\View
     */
    public function edit( Company $company )
    {
        return view( 'companies.edit', compact( 'company' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Company $company
     * @param Request $request
     * @return Response
     */
    public function update( Company $company, Request $request )
    {
        $company->update( $request->all() );

        return redirect( 'user/profile' );
    }

    /**
     * Show the form for creating a new company.
     *
     * @param Company $company
     * @return Response
     */
    public function create( Company $company, Authenticatable $user )
    {
        return view( 'companies.create', compact( 'company','user' ) );
    }
}
