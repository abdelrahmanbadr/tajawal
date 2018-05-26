<?php
namespace Tajawal\Business\Sort;

use Tajawal\Contracts\ISort;
use Illuminate\Support\Collection;

class SortHotels implements ISort
{
     /**
     * Apply a given order  to the collection .
     * sort type by default is Asc
     * @param collection $collection
     * @param array $order
     * @return Collection $collection
     */
    public function sortData(Collection $collection, array $order) : Collection
    {
        $collectionFunction = "sortBy";
        if (isset($order['type']) && $order['type'] == "desc") {
            $collectionFunction = "sortByDesc";
        }
        return $collection->$collectionFunction($order['by']);
    }
}
