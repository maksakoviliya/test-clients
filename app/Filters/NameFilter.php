<?php

namespace App\Filters;

class NameFilter implements FilterField
{
    public function filter($builder, $value)
    {
        return $builder->orWhere('name', 'like', "%$value%");
    }
}
