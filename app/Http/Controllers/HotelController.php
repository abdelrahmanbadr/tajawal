<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tajawal\Contracts\IBusiness;
use Tajawal\Validation\AbstractValidation;

class HotelController extends Controller
{
    private $hotelBusiness;
    private $validator;

    public function __construct(IBusiness $hotelBusiness, AbstractValidation $validator)
    {
        $this->hotelBusiness = $hotelBusiness;
        $this->validator = $validator;
    }

    public function search(Request $request)
    {
        $validator = $this->validator->validateRequest($request);
        if ($validator->fails()) {
            throw new \Exception($validator->messages());
            // return response()->json($validator->messages());
        }
        
        $collection = $this->hotelBusiness->search($request);
        return response()->json($collection);
    }
}
