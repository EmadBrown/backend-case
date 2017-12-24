<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Services\CmsServices;
use App\Http\Validators\NewsValidator;
use Illuminate\View\View;

class NewsAdminController extends Controller
{
 
    /**
     * @var CmsServices 
     */
    private $cmsServices;
    
    /**
     * @var NewsValidator 
     */
    private $formValidator;
    
    public function __construct(
        CmsServices $cmsServices,
        NewsValidator $formValidator
    )
    {
        // Get function's data of CmsServices r and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        $this->formValidator = $formValidator;
        
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
        return view('cms.news.index')->withNews($this->cmsServices->getData());
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
       $this->formValidator->validateRequest($request);
         
        if ($this->formValidator->isValid()) 
        {
                 
                 $this->cmsServices->save($this->formValidator->getData() , $this->cmsServices->uploadImage($request));
                Session::flash('success','The Article has successfully Added.');
                return redirect()->route('news.index');
        }
        
        // Flash message
        Session::flash('success','The Article has  successfully Added.');
        
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
        return view('cms.news.show')->withArticle($this->cmsServices->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('cms.news.edit')->withArticle($this->cmsServices->find($id));
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
        $this->formValidator->validateRequest($request);
         
        if ($this->formValidator->isValid()) 
        {
                 $this->cmsServices->update($this->formValidator->getData() , $id , $this->cmsServices->uploadImage($request));
                Session::flash('success','The Article has successfully Update.');
                return redirect()->route('news.index');
        }
        
        // Flash message
        Session::flash('success','The Article has  successfully Updated.');
        
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
