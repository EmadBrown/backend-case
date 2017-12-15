<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Services\CmsServices;
use App\Services\TestTypeServices;
use App\Http\Validators\TestTypeValidator;

class TestTypeAdminController extends Controller
{
    /**
     *
     * @var CmsServices 
     */
    private $cmsServices;
    
    /**
     * @var TestTypeValidator; 
     */
    private $formValidator;
    
    /**
     * @var TestTypeServices 
     */
    private $testTypeServices;
    
    /**
     * FacetsController constructor.
     * @param CmsServices $cmsServices
     * @param TestTypeValidator $formValidatore
     * @param TestTypeServices $testTypeServices
     */
    public function __construct(
            CmsServices $cmsServices,
            TestTypeValidator $formValidator,
            TestTypeServices $testTypeServices
            )
    {
        // Get function's data of CmsServices and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        
        $countArticle = $this->cmsServices->countArticle();
        
        View()->share([ 'countArticle' => $countArticle ]);
        
        $this->formValidator = $formValidator;
        
        $this->testTypeServices = $testTypeServices; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testTypes = $this->testTypeServices->getData();

        return view('cms.grades.test_type')->withTestTypes($testTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
         $viewData = [];
         $this->formValidator->validateRequest($request);
        if ($this->formValidator->isValid()) 
        {
                if($request->isMethod ('post'))
                {
                           $this->testTypeServices->save($this->formValidator->getData());
                           Session::flash('success','The Test Type has  successfully Added.');
                           return redirect()->route('test_type.index');
                }
               elseif($request->isMethod('put'))
                {
                           $this->testTypeServices->save($this->formValidator->getData());
                           Session::flash('success','The Test Type has  successfully Updated.');
                           return redirect()->route('test_type.index');
               }
               else   
                {
                   Session::flash('warning','You call a wrong Method.');
               }
         }
         else
        {
                $viewData['errors'] = $this->formValidator->getErrors();
                return redirect()->route('test_type.index')->withViewData($viewData);
         }
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $this->testTypeServices->delete($id);
        
         // Flsh message 
        Session::flash('info','The Test Type  has successfully Deleted.');
        
        return redirect()->route('test_type.index');
    }
}
