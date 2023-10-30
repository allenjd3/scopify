<?php

namespace Allenjd3\Scopify\Traits;

use Illuminate\Support\Collection;

trait Filterable
{
    abstract protected function scopifyFilters(): Collection;

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
        return $this->scopifyFilters()->has($scope);
    }

    private function getScopifyFilter($scope)
    {
        return new ($this->scopifyFilters()->get($scope));
    }
}
