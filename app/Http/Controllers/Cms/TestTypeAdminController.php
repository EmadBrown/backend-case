<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Session;
use App\Services\CmsServices;
use App\TestType;

class TestTypeAdminController extends Controller
{
    
    protected $cmsServices;

    public function __construct(CmsServices $cmsServices)
    {
        // Get function's data of CmsServices and pass it to all the view cms
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
        $testTypes = TestType::orderBy('created_at'  ,  'desc')->paginate(10);

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
        $testType = new TestType();
   
        // validate the data
        $this->validate($request, array(
                'test_type' => 'required'
        ));
        
          //  store the data in the Test_types table
          $testType->test_type = ucfirst(trans(Purifier::clean($request->test_type)));

          $testType->save();
          
        // Flash message
        Session::flash('success','The Test Type has  successfully Added.The Test Type is: '. ucfirst( $testType->test_type));
        
         //  view the Test Type  in cms with variable
        return redirect()->route('test_type.index');
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
                'test_type' => 'required'
        ));
        
         $testType =  TestType::find($id);
           
          //  store the data in the Test_types table
          $testType->test_type = ucfirst(trans(Purifier::clean($request->test_type)));

          $testType->update();
          
        // Flash message
        Session::flash('success','The Test Type has  successfully Updated.The Test Type is: '. ucfirst( $testType->test_type));
        
        return redirect()->route('test_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testType =  TestType::find($id);
        
        $testType->delete();
        
         // Flsh message 
        Session::flash('info','The Test Type  has successfully Deleted.The Test Type is: '. ucfirst( $testType->test_type));
        
           return redirect()->route('test_type.index');
    }
}
