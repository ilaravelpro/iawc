<?php


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
