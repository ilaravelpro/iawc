<?php

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'update':
                $rules = [];
                break;
        }
        return $rules;
    }
}
