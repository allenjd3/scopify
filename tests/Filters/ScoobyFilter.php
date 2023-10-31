<?php

namespace Allenjd3\Scopify\Tests\Filters;

use Allenjd3\Scopify\Scopify;
use Illuminate\Database\Eloquent\Builder;

class ScoobyFilter extends Scopify
{
    public function call(Builder $query, ...$args)
    {
        return $query->where('name', 'scooby');
    }
}
