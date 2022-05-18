<?php

namespace Rover\Domain\Rover;

use Rover\Domain\Coordinates\Coordinates;
use Rover\Domain\Direction\Direction;

final class RoverStatus
{
    private Coordinates $position;
    private Direction $headingDirection;

    public function __construct(string $currentStatusInput)
    {
        $currentStatus = explode(" ", $currentStatusInput);
        $this->position = new Coordinates((int)$currentStatus[0], (int)$currentStatus[1]);
        $this->headingDirection = new Direction($currentStatus[2]);
    }

    public function getPosition(): Coordinates
    {
        return $this->position;
    }

    public function getDirection(): Direction
    {
        return $this->headingDirection;
    }

    public function getRoverStatusAsString(): string
    {
        return $this->position->getX() . " " . $this->position->getY() . " " . $this->headingDirection->getHeadingDirection();
    }
}
