<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CmsServices;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   protected $cmsServices;

    public function __construct(CmsServices $cmsServices)
    {
        // Get function's data of CmsController and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        
        $countArticle = $this->cmsServices->countArticle();

        View()->share([ 'countArticle' => $countArticle ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('grade.index');
    }
}