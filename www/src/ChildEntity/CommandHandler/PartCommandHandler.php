<?php

namespace ChildEntity\CommandHandler;

use Broadway\CommandHandling\SimpleCommandHandler;
use Broadway\EventSourcing\EventSourcingRepository;
use ChildEntity\Aggregate\Part;
use ChildEntity\Command\ManufacturePartCommand;
use ChildEntity\Command\RenameManufacturerForPartCommand;

/**
 * A command handler will be registered with the command bus and handle the
 * commands that are dispatched.
 */
class PartCommandHandler extends SimpleCommandHandler
{
    private $repository;

    public function __construct(EventSourcingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * A new part aggregate root is created and added to the repository.
     *
     * @param ManufacturePartCommand $command
     */
    protected function handleManufacturePartCommand(ManufacturePartCommand $command)
    {
        $part = Part::manufacture(
            $command->partId,
            $command->manufacturerId,
            $command->manufacturerName
        );
        $this->repository->save($part);
    }

    /**
     * An existing part aggregate root is loaded and renameManufacturerTo() is
     * called.
     *
     * @param RenameManufacturerForPartCommand $command
     */
    protected function handleRenameManufacturerForPartCommand(
        RenameManufacturerForPartCommand $command
    ) {
        $part = $this->repository->load($command->partId);
        $part->renameManufacturer($command->manufacturerName);
        $this->repository->save($part);
    }
}
