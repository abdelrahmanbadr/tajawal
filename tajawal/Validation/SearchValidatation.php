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
            'price.from'=>'numeric|required_unless:price,',
            'price.to'=>'numeric|required_unless:price,',
            'date.from' => 'date|before:date.to|required_unless:date,',
            'date.to' => 'date|after:date.from||required_unless:date,',
            'order.by' => 'string|in:name,price|required_unless:order,',
            'order.type' => 'string|in:asc,desc',
        ];
    }
    /**
     * Error messages
     * @return array
     */
    protected function errorMessages(): array
    {
        return [
            'order.type.in' => 'Order Type Should Be desc or asc only',
            'order.by.in' => 'Order By Should Be price or name only',
            'date.to.required_unless' => 'Date should be an array of from and to only',
            'date.from.required_unless' => 'Date should be an array of from and to only',
            'order.by.required_unless' => 'Order should be an array of by and type only',
        ];
    }
}
