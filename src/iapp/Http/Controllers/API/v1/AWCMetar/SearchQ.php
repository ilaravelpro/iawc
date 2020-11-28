<?php


namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;


trait SearchQ
{
    public function searchQ($request, $model, $parent)
    {
        $q = $request->q;
        $model->where(function ($query) use ($q) {
            $query->where('i_awc_metars.station', 'LIKE', "%$q%")
                ->orWhere('i_awc_metars.text', 'LIKE', "%$q%")
                ->orWhere('i_awc_metars.latitude', 'LIKE', "%$q%")
                ->orWhere('i_awc_metars.longitude', 'LIKE', "%$q%")
                ->orWhere('i_awc_metars.altimeter', 'LIKE', "%$q%");
        });
    }
}
