<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
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
use Illuminate\Support\Facades\Lang;

class CompanyController extends Controller {

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
        $companies = Company::latest()->get();

        return view( 'companies.index', compact( 'companies' ) );
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
    public function edit( Company $company,Authenticatable $user )
    {
        return view( 'companies.edit', compact( 'company','user' ) );
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
        flash()->success( Lang::get( 'companies/messages.edit_ok' ) );
        if ( $company->image == "" )
        {
            $company->image = "/images/companies/company.jpg";
            $company->save();
        }
        return redirect( 'user/companies' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return Response
     */
    public function store( CompanyRequest $request )
    {
        $this->createCompany( $request );
        //flash()->success( Lang::get( 'companies/messages.create_ok' ) );

        return redirect( 'companies' );
    }

    /**
     * @param CompanyRequest $request
     * @return mixed
     */
    private function createCompany( CompanyRequest $request )
    {
        $company = Auth::user()->companies()->create( $request->all() );
        flash()->success( Lang::get( 'companies/messages.create_ok' ) );

        if ( $company->image == "" )
        {
            $company->image = "/images/companies/company.jpg";
            $company->save();
        }
        return $company;
    }


}
