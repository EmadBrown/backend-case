<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Grade;

class CmsController extends Controller
{
    
public function __construct()
{
    $this->user = \Auth::user();

    view()->share('user', $this->user);
}

    public function countArticle() 
    {
        $countArticle = News::all()->count();
        return view()->share('user', $countArticle);
    }
}
