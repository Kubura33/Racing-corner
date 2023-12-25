<?php // app/Services/CustomPaginator.php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CustomPaginator
{
public static function paginate($items, $perPage)
{
return new LengthAwarePaginator(
$items->forPage(request()->input('page', 1), $perPage),
$items->count(),
$perPage,
Paginator::resolveCurrentPage(),
['path' => Paginator::resolveCurrentPath(), 'query' => request()->query()]
);
}
}
