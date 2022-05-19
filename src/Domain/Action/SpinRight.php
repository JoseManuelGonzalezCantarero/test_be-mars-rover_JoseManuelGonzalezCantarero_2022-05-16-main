<?php

declare(strict_types=1);

namespace Rover\Domain\Action;

use Rover\Domain\Direction\Direction;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class SpinRight implements ActionInterface
{
    public function execute(Rover $rover): void
    {
        $roverStatus = $rover->getRoverStatus();
        $xPosition = $roverStatus->getPosition()->getX();
        $yPosition = $roverStatus->getPosition()->getY();
        $headingDirection = $roverStatus->getDirection()->getHeadingDirection();
        $newHeadingDirection = $this->spin($headingDirection);

        $newRoverStatus = $xPosition . " " . $yPosition . " " . $newHeadingDirection;
        $rover->setRoverStatus(new RoverStatus($newRoverStatus));
    }

    private function spin(string $headingDirection): string
    {
        switch ($headingDirection) {
            case Direction::NORTH:
                return Direction::EAST;
            case Direction::WEST:
                return Direction::NORTH;
            case Direction::SOUTH:
                return Direction::WEST;
            case Direction::EAST:
                return Direction::SOUTH;
        }

        // This should never be thrown, because we already validate the actions in ActionFactory Class
        throw new InvalidActionException($headingDirection);
    }
}
