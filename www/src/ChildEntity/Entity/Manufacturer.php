<?php

namespace ChildEntity\Entity;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use ChildEntity\Event\PartManufacturerWasRenamedEvent;

class Manufacturer extends SimpleEventSourcedEntity
{
    private $partId;
    private $manufacturerId;
    private $manufacturerName;

    public function __construct($partId, $manufacturerId, $manufacturerName)
    {
        $this->partId           = $partId;
        $this->manufacturerId   = $manufacturerId;
        $this->manufacturerName = $manufacturerName;
    }

    public function rename($manufacturerName)
    {
        if ($this->manufacturerName === $manufacturerName) {
            // If the name is not actually different we do not need to do
            // anything here.
            return;
        }
        // This event may also be handled by the aggregate root.
        $this->apply(new PartManufacturerWasRenamedEvent($this->partId, $manufacturerName));
    }

    protected function applyPartManufacturerWasRenamedEvent(PartManufacturerWasRenamedEvent $event)
    {
        $this->manufacturerName = $event->manufacturerName;
    }
}
