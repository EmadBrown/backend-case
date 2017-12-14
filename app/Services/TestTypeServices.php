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
     * @param array $data
     * @return static 
     */
    public function save(array $data) 
    {
        if (isset($data['id'])) {
            $filter = $this->testModel->findOrFail($data['id']);

            $filter->update($data);
        } else {
            $filter = $this->testModel->create($data);
        }
    }
            
}
