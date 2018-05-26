<?php
namespace Tajawal\Business\Filters;

use Tajawal\Contracts\IFilter;
use Illuminate\Support\Collection;

class MultipeDatesFilter implements IFilter
{
    public function search(Collection $collection, $array): Collection
    {
        $key = $this->attributeName;
        $rangeFrom = strtotime($array['from']);
        $rangeTo = strtotime($array['to']);
        return $collection->filter(function ($item) use ($array, $key, $rangeTo, $rangeFrom) {
            return array_filter($item->$key, function ($row) use ($rangeTo, $rangeFrom) {
                $availableFrom = strtotime($row->from);
                $availableTo   = strtotime($row->to);
                return $rangeFrom >= $availableFrom && $rangeTo <= $availableTo;
            });
        });
    }
}
