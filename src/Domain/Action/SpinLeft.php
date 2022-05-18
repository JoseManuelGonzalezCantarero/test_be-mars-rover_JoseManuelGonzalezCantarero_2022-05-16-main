<?php

declare(strict_types=1);

namespace Rover\Domain\Action;

use Rover\Domain\Direction\Direction;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class SpinLeft implements ActionInterface
{
    public function execute(Rover $rover): void
    {
        $roverStatus = $rover->getRoverStatus();
        $xPosition = $roverStatus->getPosition()->getX();
        $yPosition = $roverStatus->getPosition()->getY();
        $headingDirection = $roverStatus->getDirection()->getHeadingDirection();
        $newHeadingDirection = $this->spin($headingDirection);

        $newRoverStatus = $xPosition . " " . ($yPosition + 1) . " " . $newHeadingDirection;
        $rover->setRoverStatus(new RoverStatus($newRoverStatus));
    }

    private function spin(string $headingDirection): string
    {
        switch ($headingDirection) {
            case Direction::NORTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::NORTH;
        }

        // This should never be thrown, because we already validate the actions in ActionFactory Class
        throw new InvalidActionException($headingDirection);
    }
}
