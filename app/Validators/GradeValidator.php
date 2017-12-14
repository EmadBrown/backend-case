<?php

namespace App\Http\Validators;

use App\Http\Validators\AbstractFormValidator;

class GradeValidator extends AbstractFormValidator
{
 
    public function rules()
    {
        $this->rules = [
                   'name' => 'required|max:70',
                   'mark' =>  'required',
                   'test_type_id' =>  'required',
                   'user_id' => 'required',
                   'sufficient' => 'required'
         ];
    }
    
}

