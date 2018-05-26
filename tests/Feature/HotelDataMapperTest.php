<?php

namespace Tests\Feature;

use Tests\TestCase;
use  Tajawal\DataMapper\HotelDataMapper;
use Illuminate\Support\Collection;
use Tajawal\Models\Hotel;
class HotelDataMapperTest extends TestCase
{
   
    /**
     * A basic test collectionMapper function.
     *
     * @return void
     */
    public function test_collection_Mapper_function()
    {
        $mapper = new HotelDataMapper();
        $mock = new MockedData();
        
        $this->assertEquals($mock->getHotels(), $mapper->collectionMapper($mock->array_data()));
        
    }

}
