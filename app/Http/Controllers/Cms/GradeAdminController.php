<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grade;
use App\Http\Controllers\Cms\CmsController;
use Illuminate\View\View;

class GradeAdminController extends Controller
{
     protected $cmsController;

    public function __construct(CmsController $cmsController)
    {
        // Get function's data of CmsController and pass it to all the view cms
        $this->cmsController = $cmsController;
        
        $countArticle = $this->cmsController->countArticle();
        
        View()->share([ 'countArticle' => $countArticle ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::orderBy('created_at'  ,  'desc')->paginate(10);

        return view('cms.grade.index')->withGrades($grades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('cms.grade.create');
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
   
        // validate the data
        $this->validate($request, array(
                'name' => 'required|max:70',
                'mark' =>  'required',
                'sufficient' => 'required|boolean'
        ));
        
          //  store the data in the News table
          $grade->name = ucfirst(trans(Purifier::clean($request->name)));
          $grade->mark = ucfirst (trans(Purifier::clean($request->mark)));
          $grade->sufficient = ucfirst(trans(Purifier::clean($request->sufficient)));

          
          $grade->save();
          
        // Flash message
        Session::flash('success','The Grade has  successfully Added.The Student`s name: '. ucfirst( $grade->name));
        
         //  view the news  in cms with variable
        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::find($id);
        
        return view('cms.grade.show')->withGrade($grade);
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
        
        return view('cms.grade.edit')->withGrade($grade);
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
                'sufficient' => 'required|boolean'
        ));
        
        $grade = Grade::find($id);
        
          //  store the data in the News table
          $grade->name = ucfirst(trans(Purifier::clean($request->name)));
          $grade->mark = ucfirst (trans(Purifier::clean($request->mark)));
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
