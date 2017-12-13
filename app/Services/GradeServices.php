<?php

 
namespace App\Services;

use App\Models\TestType;
use App\User;

class GradeServices 
{
    public function getTestTypes() 
    {
        $testTypes = TestType::all();
        
        return $testTypes;
    }
    
     public function getUsers() 
    {
        $users= User::all();
        
        return $users;
    }
}
