<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
        protected $fillable = [
        'name', 'mark', 'sufficient', 
    ];

    
    public function User() 
    {
        return $this->belongsTo('App\User');
    }
    
    public function TestType() 
    {
        return $this->hasMany('App\TestType');
    }
}

