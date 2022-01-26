<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];

    protected $key = "";

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function filter(Builder $builder)
    {
        foreach($this->filters as $filter => $value)
        {
            $this->resolveFilter($filter)->filter($builder, $this->getKey());
        }
        return $builder;
    }


    protected function getKey()
    {
        return $this->request->get($this->key);
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
