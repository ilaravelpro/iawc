<?php


namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCTaf;


trait SearchQ
{
    public function searchQ($request, $model, $parent)
    {
        $q = $request->q;
        $model->where(function ($query) use ($q) {
            $query->where('i_awc_tafs.station', 'LIKE', "%$q%")
                ->orWhere('i_awc_tafs.text', 'LIKE', "%$q%")
                ->orWhere('i_awc_tafs.latitude', 'LIKE', "%$q%")
                ->orWhere('i_awc_tafs.longitude', 'LIKE', "%$q%")
                ->orWhere('i_awc_tafs.elevation', 'LIKE', "%$q%");
        });
    }
}
