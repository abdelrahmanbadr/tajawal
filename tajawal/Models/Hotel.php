<?php

namespace Tajawal\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Hotel implements JsonSerializable
{
     /**
     * @var string
     */
    public $name;
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    public $city;
    /**
     * @var array
     */
    public $availability;

    
    /**
     * Constructor to set initial or default values of member properties
     * @param string  $name Initialization value for $this->name
     * @param string  $city Initialization value for $this->city
     * @param float  $price Initialization value for $this->price
     * @param array $availability Initialization value for $this->availability
     */
    public function __construct(string $name, string $city, float $price, array $availability)
    {
        $this->name = $name;
        $this->city = $city;
        $this->price = $price;
        $this->availability = $availability;
    }

    /**
     *  @return array
     */
    public function jsonSerialize() : array
    {
        $array = array();
        $array['name'] = $this->name;
        $array['city'] = $this->city;
        $array['price'] = $this->price;
        $array['availability'] = $this->availability;
        return $array;
    }
}
