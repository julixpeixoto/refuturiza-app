<?php

use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('paginate')) {

    function paginate($data, $perPage)
    {
        $page = request()->has('page') ? request('page') : 1;
        $numberPerPage = request()->has('per_page') ? request('per_page') : $perPage;
        $offset = ($page * $perPage) - $perPage;

        $newCollection = collect(json_decode($data),true);

        $paginated =  new LengthAwarePaginator(
            $newCollection->slice($offset, $numberPerPage),
            $newCollection->count(),
            $numberPerPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return $paginated;
    }
}
