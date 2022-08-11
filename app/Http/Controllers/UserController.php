<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
    public function index()
    {

        //paginate() if you need to paginate users
        $users = User::all();
        if ($users) {
            //we can use trasformer/resource instead 
            foreach ($users as $key => $user) {
                $data[$key]= $this->generateData($user);
            }
        return response()->json(['data'=>$data],200);
        }
        
    }

    public function generateData($user)
    {
        return [
                "name"=>$user->name,
                "email"=>$user->email,
                "phone"=>$user->phone,
                "companies"=>$user->companies()->get(['name'])->toArray(),
            ];
    }
}
