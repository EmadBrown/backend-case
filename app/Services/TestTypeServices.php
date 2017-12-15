<?php

namespace App\Services;

use App\Models\TestType;

class TestTypeServices 
{

    /**
     * @var TestType 
     */
    private $testModel;
            
     /**
      *  TestTypeServices constructor
      * @param TestType $testModel 
      */
    public function __construct(
        TestType $testModel
    ) 
    {
        $this->testModel = $testModel;
    }
    
    /**
     * 
     * @return array
     */
    public function getData()
    {
       $data = $this->testModel::orderBy('created_at'  ,  'desc')->paginate(10);
        return $data;
    }
    
    /**
     * @param array $data
     * @return static 
     */
    public function save(array $data) 
    {
        if (isset($data['id'])) 
        {
            $filter = $this->testModel->findOrFail($data['id']);

            $filter->update($data);
        } 
        else 
        {
            $filter = $this->testModel->create($data);
        }
        
        return $filter;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function delete($id)
    {
        $testType =  TestType::findOrFail($id);
         return $testType->delete();
    }
            
}
