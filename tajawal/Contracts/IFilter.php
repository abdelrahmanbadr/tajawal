<?php

namespace Tajawal\Contracts;

use Illuminate\Support\Collection;

interface IFilter
{
    /**
     * Apply a given search value to the collection .
     * @param Collection $collection
     * @param mixed $value
     * @return Collection $collection
     */
    public function search(Collection $collection, $value) : Collection;
}
