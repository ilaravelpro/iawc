<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait IssueTime
{
    public function issue_time()
    {
        return $this->UTCTime($this->record->issue_time);
    }
}
