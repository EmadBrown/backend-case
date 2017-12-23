<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CmsServices;
use App\Services\GradeServices;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Session;
use App\Models\Grade;

class GradeAdminController extends Controller
{
    protected $cmsServices;
    
    protected $gradeServices;

    public function __construct(CmsServices $cmsServices , GradeServices $gradeServices )
    {
        // Get function's data of CmsServices and pass it to all the view cms
        $this->cmsServices = $cmsServices;
        
        $countArticle = $this->cmsServices->countArticle();

        View()->share([ 'countArticle' => $countArticle ]);
        
       // Getting function's  of TestTypeServices 
            $this->gradeServices = $gradeServices;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::orderBy('created_at'  ,  'desc')->paginate(10);
        
        return view('cms.grades.index')->withGrades($grades);
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
        $grade = new Grade();
   
          //  store the data in the News table
            $grade->name = ucfirst(trans(Purifier::clean($request->name)));
            $grade->mark = ucfirst (trans(Purifier::clean($request->mark)));
            $grade->test_type_id = $request->test_type_id;
            $grade->user_id = $request->user_id;
            $grade->sufficient = ucfirst(trans(Purifier::clean($request->sufficient)));

          
            $grade->save();
          
        // Flash message
        Session::flash('success','The Grade has  successfully Added.The Student`s name: '. ucfirst( $grade->name));
        
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
        $grade = Grade::find($id);
        
        $testTypes = $this->gradeServices->getTestTypes();

         $users = $this->gradeServices->getUsers();
             
        return view('cms.grades.edit')->withGrade($grade)->withTestTypes($testTypes)->withUsers($users);
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
                'name' => 'required|max:70',
                'mark' =>  'required',
                'test_type_id' =>  'required',
                'user_id' => 'required',
                'sufficient' => 'required'
        ),
                
                $messsages = array(
                'test_type_id.required'=>'First Add Test Type Then You can create grade form!',
        ));
        
        
        $grade = Grade::find($id);
        
          //  store the data in the News table
          $grade->name = ucfirst(trans(Purifier::clean($request->name)));
          $grade->mark = ucfirst (trans(Purifier::clean($request->mark)));
          $grade->test_type_id = $request->test_type_id;
          $grade->user_id = $request->user_id;
          $grade->sufficient = ucfirst(trans(Purifier::clean($request->sufficient)));

          
          $grade->update();
          
        // Flash message
        Session::flash('success','The Grade has  successfully Updated.The Student`s name: '. ucfirst( $grade->name));
        
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
        $grade = Grade::find($id);
        
        $grade->delete();
        
        // Flsh message 
        Session::flash('info','The Grade has successfully Deleted.The Student`s name: '. ucfirst( $grade->name));
        
        return redirect()->route('grade.index');
    }
}
