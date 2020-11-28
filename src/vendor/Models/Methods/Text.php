<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait Text
{
    public function text()
    {
        return (string)$this->record->raw_text;
    }
}
