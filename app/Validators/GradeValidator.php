<?php

namespace App\Http\Validators;

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
         return $this->rules;
    }
    
}

