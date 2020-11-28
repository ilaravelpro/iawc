<?php

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case 'update':
                $rules = [];
                break;
        }
        $unique = $request->has('unique') ? $request->unique : $unique;
        if ($unique) return str_replace(['required'], ['nullable'], $rules[$unique]);
        return $rules;
    }
}
