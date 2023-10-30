<?php

namespace Allenjd3\Scopify;

use Illuminate\Database\Eloquent\Builder;

abstract class Scopify
{
    abstract public function call(Builder $query, ...$args);

    public function handle($query, $next)
    {
        $this->call($query);

        return $next($query);
    }
}
