<?php

namespace Tajawal\Contracts;

use Illuminate\Support\Collection;

interface IDataSource
{

    /**
     * get all hotels from data source
     * @return Collection
     */
    public function getHotels(): Collection;
}
