<?php

namespace App\Filters;

class ManagerNameFilter implements FilterField
{
    public function filter($builder, $value)
    {
        return $builder->orWhereHas('manager', function ($query) use ($value) {
            return $query->where('name', 'like', "%$value%");
        });
    }
}
