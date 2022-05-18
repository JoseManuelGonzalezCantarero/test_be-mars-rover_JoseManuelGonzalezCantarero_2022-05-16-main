<?php

declare(strict_types=1);

namespace Rover\Domain\Rover;

use Rover\Domain\Action\Actions;

final class Rover
{
    private RoverStatus $roverStatus;
    private Actions $actions;

    public function getRoverStatus(): RoverStatus
    {
        return $this->roverStatus;
    }

    public function getRoverStatusAsString(): string
    {
        return $this->roverStatus->getRoverStatusAsString();
    }

    public function setRoverStatus(RoverStatus $roverStatus): void
    {
        $this->roverStatus = $roverStatus;
    }

    public function setActions(Actions $actions): void
    {
        $this->actions = $actions;
    }

    public function execute(): void
    {
        $iterator = $this->actions->getIterator();
        $iterator->rewind();

        while ($iterator->valid()) {
            $action = $iterator->current();
            $action->execute($this);
            $iterator->next();
        }
    }
}
