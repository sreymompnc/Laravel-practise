<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\QueryEloModel;

class QueryEloController extends Controller
{
    public function __construct(){
        $this->middleware('checkauth');
    }

    public function index(){
       // $users_data = \DB::table('student')->pluck('FirstName');
//        return view('query-eloquant', ['student' => $users_data]);
       // $users_data = \DB::table('student')->where('FirstName', 'sreymom')->first();
       // $users_data = \DB::table('student')->pluck( 'LastName');
//        $users_data = \DB::table('student')->select(\DB::raw('FirstName,LastName'))
//            ->where('FirstName','sreymom')
//            ->OrderBy('id','desc')
////            ->get();
//        $users_data  = \DB::table('customers')
//        ->select('customers.Name')
//        ->crossJoin('province')
//
//        ->get();
        $users_data = \DB::table('customers')
            -> select('customers.Name')
            -> whereBetween('customers.Id',[1,5])
            -> get();
        return view('query-eloquant', compact('users_data'));
    }
}
