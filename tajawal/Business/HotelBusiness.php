<?php
namespace Tajawal\Business;

use Tajawal\Contracts\IBusiness;
use Tajawal\Contracts\IDataSource;
use Tajawal\Contracts\ISort;
use Illuminate\Support\Collection;
use Tajawal\Validation\AbstractValidation;
use Illuminate\Http\Request;

class HotelBusiness implements IBusiness
{
    /**
     * @var IDataSource
     */
    private $dataSource;
    /**
     * @var Collection
     */
    private $collection;
    /**
     * @var ISort
     */
    private $sort;
    /**
     * @var AbstractValidation
     */
    private $validator;
    
    public function __construct(IDataSource $dataSource, ISort $sort, AbstractValidation $validator)
    {
        $this->dataSource = $dataSource;
        $this->sort = $sort;
        $this->validator = $validator;
    }

    public function search(Request $request): Collection
    {
        $validator = $this->validator->validateRequest($request);
        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }
        $this->collection = $this->dataSource->getHotels();
        foreach ($request->all() as $filterName => $value) {
            $decorator = $this->createFilterDecorator($filterName);
            if ($this->isValidDecorator($decorator)) {
                $this->collection = $this->createClassObject($decorator)->search($this->collection, $value);
            }
        }
        if (isset($request->order['by'])) {
            $this->collection = $this->sort->sortData($this->collection, $request->order);
        }

        return $this->collection;
    }

    private function createFilterDecorator($name)
    {
        return 'Tajawal\Business\Filters\\' . studly_case($name);
    }

    private function createClassObject($class)
    {
        return new $class;
    }

    private function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }
}
