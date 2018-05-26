<?php
namespace Tajawal\DataMapper;

use Tajawal\Contracts\IDataMapper;
use Tajawal\Models\Hotel;
use Illuminate\Support\Collection;

class HotelDataMapper implements IDataMapper
{
    //  /**
    //  * convert string into time
    //  * @param array $data
    //  */
    // public static function modifyDates ($item)
    // {
    //     $item->from = strtotime($item->from);
    //     $item->to = strtotime($item->to);
    // }
    
    /**
     * convert array of data to model collection
     * @param array $data
     * @return Collection
     */
    public function collectionMapper(array $hotels) : Collection
    {
        $result = [];
        foreach ($hotels as $hotel) {
            // array_walk_recursive($hotel->availability, "self::modifyDates");
            $result[] =
            new Hotel(
                (string) $hotel->name,
                (string) $hotel->city,
                (float) $hotel->price,
                (array)$hotel->availability
            );
        }
        return collect($result);
    }
}
