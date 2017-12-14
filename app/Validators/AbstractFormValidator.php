<?php

namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class AbstractFormValidator
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var bool
     */
    protected $validRequest = false;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param Request $request
     */
    public function validateRequest(Request $request)
    {
        $this->request = $request;

        $formValidation = Validator::make($request->all(), $this->rules());
        if (!$formValidation->fails()) {
            $this->data = $request->all();
            $this->validRequest = true;
        } else {
            $this->validRequest = false;
            $this->errors = $formValidation->errors();
        }
    }

    /**
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->validRequest;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array|null
     */
    public function getRequest()
    {
        if ($this->request instanceof Request) {
            return $this->request->all();
        }

        return null;
    }
}