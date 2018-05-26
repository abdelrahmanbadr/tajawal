<?php

namespace Tajawal\Contracts;

use Illuminate\Support\Collection;

interface IDataMapper
{
    /**
     * convert array of data to model collection
     * @param array $data
     * @return Collection
     */
    public function collectionMapper(array $data): Collection;
}
