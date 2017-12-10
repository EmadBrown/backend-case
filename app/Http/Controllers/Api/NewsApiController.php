<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\News;
use Auth;
use App\User;

class NewsApiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::all();
        
        return $news;
    }
}
