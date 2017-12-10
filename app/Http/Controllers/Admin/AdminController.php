<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cms\CmsController;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $cmsController;
        
    public function __construct(CmsController $cmsController)
    {
        $this->middleware('auth:admin');
        
    // Get function's data of CmsController and pass it to all the view cms
        $this->cmsController = $cmsController;
        
        $countArticle = $this->cmsController->countArticle();
        
        View()->share([ 'countArticle' => $countArticle ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.grades.index');
    }
}