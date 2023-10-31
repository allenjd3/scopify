<?php

namespace Allenjd3\Scopify\Tests\Models;

use Allenjd3\Scopify\Tests\Filters\ScoobyFilter;
use Allenjd3\Scopify\Tests\Filters\WithParams;
use Allenjd3\Scopify\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Filterable;

    public function scopeTest(Builder $query)
    {
        return $query->where('name', 'test');
    }

    public function scopeTestStandard(Builder $query)
    {
        return $query->where('name', 'test-standard');
    }

    protected function scopifyFilters()
    {
        return [
            'scooby' => ScoobyFilter::class,
            'scopifyWithParams' => WithParams::class,
        ];
    }
}
