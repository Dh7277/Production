<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryService extends Service
{
    public function delete(array $ids): void
    {
        $this->query()->whereIn('id', $ids)->delete();
    }
}


