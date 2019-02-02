<?php

namespace ChildEntity\Event;

class PartManufacturerWasRenamedEvent
{
    public $partId;
    public $manufacturerName;

    public function __construct($partId, $manufacturerName)
    {
        $this->partId           = $partId;
        $this->manufacturerName = $manufacturerName;
    }
}