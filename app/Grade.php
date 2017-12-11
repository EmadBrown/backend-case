<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
        protected $fillable = [
        'name', 'mark', 'sufficient', 
    ];

    
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    
    public function testType() 
    {
        return $this->belongsTo('App\TestType');
    }
}

