<?php

namespace ChildEntity\Command;

class RenameManufacturerForPartCommand
{
    public $partId;
    public $manufacturerName;

    public function __construct($partId, $manufacturerName)
    {
        $this->partId           = $partId;
        $this->manufacturerName = $manufacturerName;
    }
}