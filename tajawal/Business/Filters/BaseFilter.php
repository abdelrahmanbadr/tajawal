<?php
namespace Tajawal\Business\Filters;

use Tajawal\Contracts\IFilter;
use Illuminate\Support\Collection;

class BaseFilter implements IFilter
{
     /**
     * Apply a given search value to the builder instance.
     *
     * @param Collection $collection
     * @param mixed $value
     * @return Collection
     */
    public function search(Collection $collection, $value): Collection
    {
        $key = $this->attributeName;
        return  $collection->filter(function ($item) use ($value, $key) {
        
            return false !== stristr($item->$key, $value);
        });
    }
}
