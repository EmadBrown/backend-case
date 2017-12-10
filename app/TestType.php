<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    protected $fillable = [
        'test_type', 
    ];
    
    public function Grade()
    {
        return $this->hasMany('App\Grade');
    }
}
