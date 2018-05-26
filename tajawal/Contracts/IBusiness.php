<?php

namespace Tajawal\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface IBusiness
{
    /**
     * Apply search function of required business logic
     * @param Request $request
     */
    public function search(Request $request) : Collection;
}
