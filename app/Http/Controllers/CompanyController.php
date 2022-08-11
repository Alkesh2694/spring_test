<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        //dd($company->user_id);
        $user = User::find($company->user_id)->toArray();
        return response()->json(['data'=>$user],200);
        //return view('home');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json(['message'=>"Company Deleted Successfully"],204);
    }
}
