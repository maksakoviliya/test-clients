<?php

namespace App\Filters;

class TagsFilter implements FilterField
{
    public function filter($builder, $value)
    {
        return $builder->orWhereJsonContains('tags', $value);
    }
}
