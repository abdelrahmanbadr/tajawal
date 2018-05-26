<?php

namespace Tests\Feature;

use Tests\TestCase;
use  Tajawal\Business\HotelBusiness;
use Tajawal\Business\Sort\SortHotels;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HotelBusinessTest extends TestCase
{

    private $business;
    private $request;
    public function __construct()
    {
        Parent::__construct();
        $mock = new MockedData();
        $sort = new SortHotels();
        $this->request = new Request();
        $this->business = new HotelBusiness($mock,$sort);   
    }
   
    /**
     * test search function with date reange
     *
     * @return void
     */
    public function test_search_function_with_data_range()
    {
        $this->request->replace([
            'date'=>['from'=>"10-10-2020",'to'=>"13-10-2020"]
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(1, $data->count());
    }
    /**
     * test search function with city
     *
     * @return void
     */
    public function test_search_function_with_city()
    {  
        $this->request->replace([
            'city'=>"alex"
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(2, $data->count());
    }
    /**
     * test search function with name
     *
     * @return void
     */
    public function test_search_function_with_name()
    {
           
        $this->request->replace([
            'name'=>"season"
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(2, $data->count());
    }
    /**
     * test search function wrong data
     *
     * @return void
     */
    public function test_search_function_with_wrong_data()
    {
        $this->request->replace([
            'name'=>"seasons",
            'city'=>"doha",
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(0, $data->count());
    }
    /**
     * test search function orderbing by price desc
     *
     * @return void
     */
    public function test_search_function_ordering_by_price_desc()
    {
        $this->request->replace([
            'order' => ['by'=>'price','type'=>'desc'],
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(4, $data->count());
        $this->assertEquals(200.2, $data->first()->price);
    }
    /**
     * test search function orderbing by price asc
     *
     * @return void
     */
    public function test_search_function_ordering_by_price_asc()
    {
        $this->request->replace([
            'order' => ['by'=>'price'],
        ]);
        $data = $this->business->search($this->request);
        $this->assertEquals(4, $data->count());
        $this->assertEquals(80.2, $data->first()->price);
    }

}
