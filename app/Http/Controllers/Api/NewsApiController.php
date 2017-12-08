<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\News;
use Auth;
use App\User;

class NewsApiController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($studentNumber)
    {
        // make sure the user access to only his data in users table
        if( Auth::user()->student_number == $studentNumber )
        {
            
        $user = User::all()->Where('student_number', '=', $studentNumber)->first();
        return $user;
        
        }
        else
        {
            return 'You do not have access to this data';
        } 
        
        return  view('news.index');
    }
}
