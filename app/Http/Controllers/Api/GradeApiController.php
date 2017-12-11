<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Grade;

class GradeApiController extends Controller
{

    public function index($studentNumber)
    {
        // make sure the user access to only his data in users table
        if( Auth::user()->student_number == $studentNumber )
        {
            // Get user from Table Users By Student Number
            $user = Grade::all()->Where('student_number', '=', $studentNumber)->first();
            return $user;
        }
        else
        {
            return 'You do not have access to this data';
        } 
        
    }
    
}
