<?php

namespace Allenjd3\Scopify\Tests\Filters;

use Allenjd3\Scopify\Scopify;
use Illuminate\Database\Eloquent\Builder;

class WithParams extends Scopify
{
    public function call(Builder $query, ...$args)
    {
        return $query->where('id', $args['id']);
    }
}
