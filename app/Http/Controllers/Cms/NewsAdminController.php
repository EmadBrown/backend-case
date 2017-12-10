<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Session;
use Image;
use App\News;
class NewsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
   
        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:70',
                'author' =>  'required|min:3|max:60',
                'description' => 'required|min:10'
        ));
        
          //  store the data in the News table variable
          $news->title = ucfirst(trans(Purifier::clean($request->title)));
          $news->author = lcfirst (trans(Purifier::clean($request->author)));
          $news->description = ucfirst(trans(Purifier::clean($request->description)));
       
          // upload image
          if($request->hasFile('image_url')){
              $image = $request->file('image_url');
              $fileName = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/news/' . $fileName );
              Image::make($image)->resize(800 , 400)->save($location);
              
              $news->image_url = $fileName;
          }
          
          $news->save();
          
        // Flash message
        Session::flash('success','The News has  successfully Added.The title`s News: '. ucfirst( $news->title));
        
         //  view the news  in cms with variable
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
