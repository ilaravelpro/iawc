<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Tag
{
    public function tag()
    {
        return (string)$this->record->tag;
    }
}
