<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
        protected $fillable = [
        'name', 'test_type', 'mark', 'author',
    ];

    
    public function User() 
    {
        return $this->belongsTo('App\User');
    }
}

