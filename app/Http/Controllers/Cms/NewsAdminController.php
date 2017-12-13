<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Session;
use Image;
use App\Models\News;
use App\Services\CmsServices;
use Illuminate\View\View;

class NewsAdminController extends Controller
{
 
    protected $cmsServices;

    public function __construct(CmsServices $cmsServices)
    {
        // Get function's data of CmsServices r and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        
        $countArticle = $this->cmsServices->countArticle();
        
        View()->share([ 'countArticle' => $countArticle ]);
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at'  ,  'desc')->paginate(10);

        return view('cms.news.index')->withNews($news);
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
        $article = new News();
   
        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:70',
                'author' =>  'required|min:3|max:60',
                'description' => 'required|min:10'
        ));
        
          //  store the data in the News table
          $article->title = ucfirst(trans(Purifier::clean($request->title)));
          $article->author = ucfirst (trans(Purifier::clean($request->author)));
          $article->description = ucfirst(trans(Purifier::clean($request->description)));
       
          // upload image
          if($request->hasFile('image_url')){
              $image = $request->file('image_url');
              $fileName = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/news/' . $fileName );
              Image::make($image)->resize(800 , 400)->save($location);
              
              $article->image_url = $fileName;
          }
          
          $article->save();
          
        // Flash message
        Session::flash('success','The Article has  successfully Added.The Article`s title: '. ucfirst( $article->title));
        
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
        $article = News::find($id);
        
        return view('cms.news.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $article = News::find($id);
         
         return view('cms.news.edit')->withArticle($article);
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
          // validate the data
        $this->validate($request, array(
                'title' => 'required|max:70',
                'author' =>  'required|min:3|max:60',
                'description' => 'required|min:10'
        ));
        
         $article = News::find($id);
         
          //  store the data in the News table
          $article->title = ucfirst(trans(Purifier::clean($request->title)));
          $article->author = ucfirst (trans(Purifier::clean($request->author)));
          $article->description = ucfirst(trans(Purifier::clean($request->description)));
       
           // upload image
          if($request->hasFile('image_url')){
              $image = $request->file('image_url');
              $fileName = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/news/' . $fileName );
              Image::make($image)->resize(800 , 400)->save($location);
              
              $article->image_url = $fileName;
          }
          
          $article->update();
          
        // Flash message
        Session::flash('success','The Article has  successfully Updated.The Article`s title: '. ucfirst( $article->title));
        
         //  view the news  in cms with variable
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = News::find($id);
        
        $article->delete();
        
        // Flsh message 
        Session::flash('info','The Article has successfully Deleted.The Article`s title: '. ucfirst( $article->title));
        
        return redirect()->route('news.index');
    }
}
