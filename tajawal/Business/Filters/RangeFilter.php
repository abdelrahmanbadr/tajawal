<?php

namespace Tajawal\Business\Filters;

use Tajawal\Contracts\IFilter;
use Illuminate\Support\Collection;

class RangeFilter implements IFilter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Collection $collection
     * @param mixed $value
     * @return Collection
    */
    public function search(Collection $collection, $array): Collection
    {
        $key = $this->attributeName;
        $rangeFrom = $array['from'];
        $rangeTo = $array['to'];
        return $collection->filter(function ($item) use ($array, $key, $rangeTo, $rangeFrom) {
            return $item->$key >= $rangeFrom && $item->$key <= $rangeTo;
        });
    }
}
