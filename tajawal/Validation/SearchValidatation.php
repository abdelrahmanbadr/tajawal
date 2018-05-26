<?php

namespace Tajawal\Validation;

use Illuminate\Http\Request;

class SearchValidatation extends AbstractValidation
{
    /**
     * search validation rules
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'string',
            'city' => 'string',
            'price.from'=>'numeric|required_unless:price.to,',
            'price.to'=>'numeric|required_unless:price.from,',
            'date.from' => 'date|before:date.to|required_unless:date.to,',
            'date.to' => 'date|after:date.from||required_unless:date.from,',
            'order.by' => 'string|in:name,price|required_unless:order,',
            'order.type' => 'string|in:asc,desc',
        ];
    }
}
