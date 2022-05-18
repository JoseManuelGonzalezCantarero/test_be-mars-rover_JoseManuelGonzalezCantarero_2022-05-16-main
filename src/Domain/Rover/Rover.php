<?php

declare(strict_types=1);

namespace Rover\Domain\Rover;

final class Rover
{
    private RoverStatus $roverStatus;

    public function getRoverStatus(): RoverStatus
    {
        return $this->roverStatus;
    }

    public function setRoverStatus(RoverStatus $roverStatus): void
    {
        $this->roverStatus = $roverStatus;
    }

    public function getRoverStatusAsString(): string
    {
        return $this->roverStatus->getRoverStatusAsString();
    }
}
