<?php

namespace Allenjd3\Scopify\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface QueryObject
{
    public function call(Builder $query);
}
