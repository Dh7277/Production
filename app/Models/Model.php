<?php

namespace App\Models;

use App\Models\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @mixin \Eloquent
 */
class Model extends BaseModel
{
    // use HasUuidColumn;

    protected $hidden = [
        'deleted_at',
    ];
}
