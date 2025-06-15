<?php

namespace App\Services;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Builder as ScoutBuilder;

abstract class Service
{
    /** @var class-string<Model> */
    protected const MODEL = Model::class;

    protected function query(): Builder
    {
        return static::MODEL::query();
    }

    // protected function search(string $search): ScoutBuilder
    // {
    //     return static::MODEL::search($search);
    // }
}
