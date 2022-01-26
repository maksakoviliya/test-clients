<?php

namespace App\Filters;

interface FilterField
{
    public function filter($builder, $value);
}
