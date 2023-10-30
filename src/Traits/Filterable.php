<?php

namespace Allenjd3\Scopify\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Pipeline;

trait Filterable
{
    protected abstract function scopifyFilters(): array;

    public function hasNamedScope($scope)
    {
        return method_exists($this, 'scope'.ucfirst($scope))
            || $this->hasScopifyFilter($scope);
    }

    public function callNamedScope($scope, array $parameters = [])
    {
        if ($this->hasScopifyFilter($scope)) {
            return $this->getScopifyFilter($scope)->call(...$parameters);
        }

        return parent::callNamedScope($scope, $parameters);
    }

    private function hasScopifyFilter($scope)
    {
        return collect($this->scopifyFilters())->has($scope);
    }

    private function getScopifyFilter($scope)
    {
        return new (data_get($this->scopifyFilters(), $scope));
    }

    protected function filters(array $filters)
    {
        return Pipeline::send($this->query())
            ->through(...$filters)
            ->thenReturn();
    }
}
