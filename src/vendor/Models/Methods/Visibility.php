<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Visibility
{
    public function visibility()
    {
        return [
            'horizontal' => (float)$this->record->visibility_statute_mi,
            'vertical' => (int)$this->record->vert_vis_ft ? : (int)$this->record->vert_gust_kt,
        ];
    }
}
