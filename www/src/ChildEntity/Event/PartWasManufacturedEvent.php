<?php

namespace ChildEntity\Event;

class PartWasManufacturedEvent
{
    public $partId;
    public $manufacturerId;
    public $manufacturerName;

    public function __construct($partId, $manufacturerId, $manufacturerName)
    {
        $this->partId           = $partId;
        $this->manufacturerId   = $manufacturerId;
        $this->manufacturerName = $manufacturerName;
    }
}