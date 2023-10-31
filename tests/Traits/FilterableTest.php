<?php

use Allenjd3\Scopify\Tests\Models\Post;

it('checks if scope function exists', function () {
    $model = new Post;

    expect($model->hasNamedScope('test'))->toBe(true);
    expect($model->hasNamedScope('test2'))->toBe(false);
});

it('checks if scope function exists using scopifyFilters', function () {
    $model = new Post;

    expect($model->hasNamedScope('scooby'))->toBe(true);
    expect($model->hasNamedScope('scooby2'))->toBe(false);
});

it('uses standard scopes', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "name" = \'test-standard\'',
        $query->testStandard()->toRawSql(),
    );
});

it('uses scopifyFilters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "name" = \'scooby\'',
        $query->scooby()->toRawSql(),
    );
});

it('uses scopifyFilters with parameters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "id" = 2',
        $query->scopifyWithParams(id: 2)->toRawSql(),
    );
});

it('allows you to chain scopifyFilters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "name" = \'scooby\' and "id" = 2',
        $query->scooby()->scopifyWithParams(id: 2)->toRawSql(),
    );
});
