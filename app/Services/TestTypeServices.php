<?php

 
namespace App\Services;

use App\TestType;

class TestTypeServices 
{
    public function getTestTypes() 
    {
        $testTypes = TestType::all();
        
        return $testTypes;
    }
}
