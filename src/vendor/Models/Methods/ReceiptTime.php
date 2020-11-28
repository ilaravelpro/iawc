<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ReceiptTime
{
    public function receipt_time()
    {
        return $this->UTCTime($this->record->receipt_time);
    }

}
