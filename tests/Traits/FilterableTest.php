<?php

it('checks if scope function exists', function () {
    $model = getModelExample();

    expect($model->hasNamedScope('test'))->toBe(true);
    expect($model->hasNamedScope('test2'))->toBe(false);
});

it('checks if scope function exists using scopifyFilters', function () {
    $model = getModelExample();

    expect($model->hasNamedScope('scooby'))->toBe(true);
    expect($model->hasNamedScope('scooby2'))->toBe(false);
});

function getModelExample()
{
    return new class {
        use \Allenjd3\Scopify\Traits\Filterable;

        public function scopeTest($query)
        {
            return $query;
        }

        protected function scopifyFilters()
        {
            return [
                'scooby' => 'App\Filters\FakeFilter',
            ];
        }
    };
}
