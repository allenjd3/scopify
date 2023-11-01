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
        'select * from "posts" where "name" = ?',
        $query->testStandard()->toSql(),
    );
});

it('uses scopifyFilters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "name" = ?',
        $query->scooby()->toSql(),
    );
});

it('uses scopifyFilters with parameters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "id" = ?',
        $query->scopifyWithParams(id: 2)->toSql(),
    );
});

it('allows you to chain scopifyFilters', function () {
    $query = Post::query();
    $this->assertEquals(
        'select * from "posts" where "name" = ? and "id" = ?',
        $query->scooby()->scopifyWithParams(id: 2)->toSql(),
    );
});
