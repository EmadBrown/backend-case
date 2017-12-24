<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CmsServices;
use App\Services\GradeServices;
use Illuminate\Support\Facades\Session;
use App\Http\Validators\GradeValidator;

class GradeAdminController extends Controller
{
    
    private $formValidator;
    /**
     *
     * @var CmsServices 
     */
    protected $cmsServices;
    
    /**
     *
     * @var GradeServices 
     */
    protected $gradeServices;
    
    /**
     * 
     * @param CmsServices $cmsServices
     * @param GradeServices $gradeServices
     */
    public function __construct(
        CmsServices $cmsServices ,
        GradeServices $gradeServices,
        GradeValidator $formValidator
    )
    {
        // Get function's data of CmsServices and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        
        $countArticle = $this->cmsServices->countArticle();

        View()->share([ 'countArticle' => $countArticle ]);
        
       // Getting function's  of TestTypeServices 
            $this->gradeServices = $gradeServices;
            
            $this->formValidator = $formValidator;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.grades.index')->withGrades($this->gradeServices->getData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testTypes = $this->gradeServices->getTestTypes();
        
        $users = $this->gradeServices->getUsers();
        
         return view('cms.grades.create')->withTestTypes($testTypes)->withUsers($users);
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
                 $this->gradeServices->save($this->formValidator->getData());
                Session::flash('success','The Grade has  successfully Added.');
                return redirect()->route('grade.index');
        }
        
        // Flash message
        Session::flash('danger','The Grade has  Not  Added.');
        
         //  view the news  in cms with variable
        return redirect()->route('grade.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      
        $testTypes = $this->gradeServices->getTestTypes();

         $users = $this->gradeServices->getUsers();
             
        return view('cms.grades.edit')->withGrade($this->gradeServices->edit($id))->withTestTypes($testTypes)->withUsers($users);
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
                 $this->gradeServices->save($this->formValidator->getData());
                Session::flash('success','The Grade has  successfully Updated.');
                return redirect()->route('grade.index');
        }
        
        // Flash message
        Session::flash('danger','The Grade has  Not  Updated.');
        
         //  view the news  in cms with variable
        return redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->gradeServices->delete($id);
        // Flsh message 
        Session::flash('info','The Grade has successfully Deleted.');
        
        return redirect()->route('grade.index');
    }
}
