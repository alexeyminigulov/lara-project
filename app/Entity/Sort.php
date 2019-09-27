<?php

namespace App\Entity;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Sort
{
    const ASC = 'asc';
    const DESC = 'desc';

    public $fieldName;

    public $fieldValue;

    public $collection = [];

    public function __construct(Request $request, Collection $collection)
    {
        $this->collection = $collection;

        foreach ($this->getFields() as $field) {

            if ($request->has($field) && in_array($request->input($field), [self::ASC, self::DESC])) {
                $this->fieldName = $field;
                $this->fieldValue = $request->input($field);
            }
        }
    }

    public function isAsc($field)
    {
        if ($field == $this->fieldName) {

            return $this->fieldValue == self::ASC;
        }

        return false;
    }

    public function sort()
    {
        $descending = $this->fieldValue == self::DESC;

        $this->collection = $this->updateKeys($this->collection->sortBy($this->fieldName, SORT_REGULAR, $descending));

        return $this;
    }

    public function onlyIsActive()
    {
        $this->collection = $this->collection->filter(function ($value, $key) {
            return $value['isActive'];
        });

        return $this;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    private function updateKeys(Collection $collection)
    {
        $toArray = array_values($collection->all());

        return collect($toArray);
    }

    private function getFields()
    {
        return [
            'age',
            'eyeColor',
            'name',
            'gender',
            'company',
            'email',
            'phone',
            'address',
        ];
    }
}
