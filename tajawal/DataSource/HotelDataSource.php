<?php
namespace Tajawal\DataSource;

use Tajawal\Contracts\IDataSource;
use Tajawal\Contracts\IDataMapper;
use Illuminate\Support\Collection;
use Tajawal\Models\Hotel;
use GuzzleHttp\Client;
use Cache;
use Exception;

class HotelDataSource implements IDataSource
{
    /**
     * @var array
     */
    private $hotels;
    /**
     * api url
     * @var string
     */
    private $endPoint;
    /**
     *@var IDataMapper
     */
    private $dataMapper;

    
    /**
     * @param IDataMapper $dataMapper
     */
    public function __construct(IDataMapper $dataMapper)
    {
        $this->endPoint = env('HOTELS_API_URL');
        $this->dataMapper = $dataMapper;
        $this->setHotels();
    }

    /**
     * @return Collection
     */
    public function getHotels(): Collection
    {

        return $this->dataMapper->collectionMapper($this->hotels);
    }
    
    /**
     * Setter method for hotels property
     * caching data assuming that the API data will not be changed
     */
    private function setHotels()
    {
        if (!Cache::Has('HotelsApiDataSource'.$this->endPoint)) {
            $client = new Client();
            $response = $client->get($this->endPoint);
            $result = json_decode((string) $response->getBody());
            try {
                $this->hotels = $result->hotels;
            } catch (Exception $e) {
                // it should be separated in other class
                throw new Exception("Api Data Not Valid");
            }
          
            Cache::put("HotelsApiDataSource".$this->endPoint, $this->hotels, 2000);
        } else {
            $this->hotels = Cache::get("HotelsApiDataSource".$this->endPoint);
        }
    }
}
