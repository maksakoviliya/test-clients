<?php

namespace App\Filters;

class ClientsFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameFilter::class,
        'tags' => TagsFilter::class,
        'managerName' => ManagerNameFilter::class
    ];

    protected $key= "search";
}
