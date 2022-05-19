<?php

declare(strict_types=1);

namespace Rover\Domain\Rover;

final class RoverSquad extends \ArrayObject
{
    public function execute(): void
    {
        $iterator = $this->getIterator();
        $iterator->rewind();

        while ($iterator->valid()) {
            $action = $iterator->current();
            $action->execute($this);
            $iterator->next();
        }
    }

    public function getRoverSquadStatusAsString(): string
    {
        $iterator = $this->getIterator();
        $iterator->rewind();

        $status = [];

        while ($iterator->valid()) {
            /** @var Rover $rover */
            $rover = $iterator->current();
            $status[] = $rover->getRoverStatusAsString();
            $iterator->next();
        }

        return implode("\n", $status);
    }
}
