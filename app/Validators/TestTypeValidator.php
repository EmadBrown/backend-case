<?php

namespace App\Http\Validators;

use App\Http\Validators\AbstractFormValidator;

class TestTypeValidator extends AbstractFormValidator {
    
    public function rules() 
    {
    
        /**
              * @return array
        */
        $this->rules = [
                 'test_type' => 'required|min:3'
        ];
        
         return $this->rules;
    }
    
    
}
