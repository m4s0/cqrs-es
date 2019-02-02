<?php

namespace ChildEntity\Repository;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use ChildEntity\Aggregate\Part;

/**
 * A repository that will only store and retrieve Part aggregate roots.
 */
class PartRepository extends EventSourcingRepository
{
    public function __construct(EventStore $eventStore, EventBus $eventBus)
    {
        parent::__construct(
            $eventStore,
            $eventBus,
            Part::class,
            new PublicConstructorAggregateFactory()
        );
    }
}