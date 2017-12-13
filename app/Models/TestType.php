<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    
 
     
    protected $fillable = [
        'test_type', 
    ];
    
    public function grade()
    {
        return $this->hasMany('App\Grade');
    }
}
