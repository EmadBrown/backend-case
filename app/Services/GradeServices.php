<?php

 
namespace App\Services;

use Mews\Purifier\Facades\Purifier;
use App\Models\TestType;
use App\Models\Grade;
use App\User;

class GradeServices 
{
    /**
     *
     * @var GradeModel 
     */
    private $gradeModel;
    
    public function __construct(
        Grade $gradeModel 
    )
    {
            $this->gradeModel = $gradeModel;

    }
    /**
     * 
     * @return type
     */
    public function getTestTypes() 
    {
        $testTypes = TestType::all();
        return $testTypes;
    }
    
    /**
     * 
     * @return array
     */
     public function getUsers() 
    {
        $users= User::all();
        return $users;
    }
    /**
     * 
     * @return array
     */
    public function getData() 
    {
        $grades = Grade::orderBy('created_at'  ,  'desc')->paginate(10);
        
        return $grades;
    }
    
    /**
     * 
     * @param type $id
     * @return array
     */
    public function edit($id) {
        $grade = $this->gradeModel->find($id);
        return $grade;
    }
    
    /**
     * 
     * @param array $data
     * @return array
     */
    public function save($data)
    {
            $grade =  new Grade;
            $grade->name = ucfirst(trans(Purifier::clean($data['name'])));
            $grade->mark = ucfirst (trans(Purifier::clean($data['mark'])));
            $grade->test_type_id = $data['test_type_id'];
            $grade->user_id = $data['user_id'];
            $grade->sufficient = ucfirst(trans(Purifier::clean($data['sufficient'])));
            return $grade->save();
    }
    
        /**
     * 
     * @param type $id
     * @return boolean
     */
    public function delete($id)
    {
        $testType =  Grade::findOrFail($id);
         return $testType->delete();
    }
            
}
