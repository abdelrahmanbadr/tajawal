<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tajawal\Contracts\IBusiness;

class HotelController extends Controller
{
    private $hotelBusiness;

    public function __construct(IBusiness $hotelBusiness)
    {
        $this->hotelBusiness = $hotelBusiness;
    }

    public function search(Request $request)
    {
        $collection = $this->hotelBusiness->search($request);
        return response()->json($collection);
    }
}
