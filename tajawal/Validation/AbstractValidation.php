<?php

namespace Tajawal\Validation;

use Illuminate\Http\Request;
use Validator;

abstract class AbstractValidation
{
    /**
     * search validation rules
     * @return array
     */
    protected abstract function rules(): array;
   
    /**
     * Error messages
     * @return array
     */
    protected abstract function errorMessages(): array;
   
    /**
     * @param Request $request
     */
    public function validateRequest(Request $request)
    {
        // $validator = $request->validate($this->rules());
        return Validator::make($request->all(), $this->rules(), $this->errorMessages());
    }
}
