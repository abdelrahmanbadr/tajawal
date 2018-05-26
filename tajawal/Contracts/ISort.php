<?php

namespace Tajawal\Contracts;

use Illuminate\Support\Collection;

interface ISort
{
    /**
     * Apply a given order  to the collection .
     * sort type by default is Asc
     * @param Collection $collection
     * @param array $order
     * @return Collection $collection
     */
    public function sortData(Collection $collection, array $order) : Collection;
}
