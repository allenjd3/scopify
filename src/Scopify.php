<?php

namespace Allenjd3\Scopify;

use Allenjd3\Scopify\Contracts\QueryObject;
use Illuminate\Database\Eloquent\Builder;

abstract class Scopify implements QueryObject
{
    abstract public function call(Builder $query);

    public function handle($query, $next)
    {
        $this->call($query);

        return $next($query);
    }
}
