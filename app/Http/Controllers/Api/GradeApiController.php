<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Grade;
use Auth;

class GradeApiController extends Controller
{

    public function index($studentNumber)
    {
        // make sure the user access to only his data in users table
        if( Auth::user()->student_number == $studentNumber )
        {
            // Get user from Table Grade  By user_id through the relation 
            $user = Grade::all()->Where('user_id', '=', Auth::user()->id)->first();
            
            $testType = $user->testType->test_type;

            return $user ;
        }
        else
        {
            return 'You do not have access to this data';
        } 
        
    }
    
}
