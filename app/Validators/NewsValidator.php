<?php

namespace App\Http\Validators;

class NewsValidator extends AbstractFormValidator
{
  
    public function rules()
    {
        $this->rules = [
                    'title' => 'required|max:70',
                    'author' =>  'required|min:3|max:60',
                    'description' => 'required|min:10'
         ];
         return $this->rules;
    }
    
}
