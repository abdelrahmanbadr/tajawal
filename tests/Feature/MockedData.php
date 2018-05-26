<?php

namespace Tests\Feature;

use Tajawal\Contracts\IDataSource;
use Tajawal\Models\Hotel;
use Illuminate\Support\Collection;
class MockedData implements IDataSource
{
  
     /**
     * @return Collection
     */
    public  function getHotels(): Collection
    {
        $data = [];
        foreach($this->array_data() as $hotel){
            $data[] = new Hotel((string) $hotel->name,(string) $hotel->city,(float) $hotel->price,(array)$hotel->availability);

        }
        return collect($data); 
    }
     /**
     * @return array
     */
    public function array_data(): array
    {
       
        $array = [
           [ 'name'=>'green plaza Hotel',"price"=>102.2,"city"=>"alexandria","availability"=>[["from" => "01-11-2020","to" => "15-11-2020"]]],
           [ 'name'=>'Concorde Hotel',"price"=>150.2,"city"=>"alexandria","availability"=>[["from" => "01-11-2021","to" => "15-11-2021"]]],
           [ 'name'=>'four seasons',"price"=>200.2,"city"=>"dubai","availability"=>[["from" => "10-10-2020","to" => "15-10-2020"]]],
           [ 'name'=>'four seasons',"price"=>80.2,"city"=>"cairo","availability"=>[["from" => "01-12-2020","to" => "20-12-2020"],["from" => "01-01-2021","to" => "01-02-2021"]]],
        ];
        
        return json_decode (json_encode ($array));
       
    }
}
