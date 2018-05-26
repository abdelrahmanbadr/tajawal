<?php

namespace Tests\Feature;

use Tests\TestCase;
use  Tajawal\Contracts\IDataSource;
use Illuminate\Support\Collection;

class HotelControllerTest extends TestCase
{
    
    /**
     * @return void
     */
    public function test_search_route()
    {
        $response = $this->call('POST', 'api/search');
        
        $this->assertEquals(200, $response->getStatusCode()); 
    }
    /**
     * @return void
     */
    public function test_search_route_with_not_valid_inputs()
    {
        $response = $this->call('POST', 'api/search',[
            'date'=>['dateFrom'=>'10-01-2020']
        ]);
        $this->assertEquals(500, $response->getStatusCode()); 
    }

}
