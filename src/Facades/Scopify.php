<?php

namespace Allenjd3\Scopify\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Allenjd3\Scopify\Scopify
 */
class Scopify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Allenjd3\Scopify\Scopify::class;
    }
}
