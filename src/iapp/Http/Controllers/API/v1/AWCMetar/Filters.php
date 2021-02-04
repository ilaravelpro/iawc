<?php


namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $user = auth()->user();
        $current = [];
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
        ];
        $this->filterWithSTED($request, $model, $parent, $filters, $operators);
        return [$filters, $current, $operators];
    }
}
