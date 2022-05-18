<?php

declare(strict_types=1);

namespace Rover\Domain\Action;

use Rover\Domain\Direction\Direction;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class Move implements ActionInterface
{
    public function execute(Rover $rover): void
    {
        $roverStatus = $rover->getRoverStatus();
        $xPosition = $roverStatus->getPosition()->getX();
        $yPosition = $roverStatus->getPosition()->getY();
        $headingDirection = $roverStatus->getDirection()->getHeadingDirection();

        $this->move($headingDirection, $xPosition, $yPosition, $rover);
    }

    private function move(string $headingDirection, int $xPosition, int $yPosition, Rover $rover): void
    {
        switch ($headingDirection) {
            case Direction::NORTH:
                $newRoverStatus = $xPosition . " " . ($yPosition + 1) . " " . $headingDirection;
                $rover->setRoverStatus(new RoverStatus($newRoverStatus));
                break;
            case Direction::WEST:
                $newRoverStatus = ($xPosition - 1) . " " . $yPosition . " " . $headingDirection;
                $rover->setRoverStatus(new RoverStatus($newRoverStatus));
                break;
            case Direction::EAST:
                $newRoverStatus = ($xPosition + 1) . " " . $yPosition . " " . $headingDirection;
                $rover->setRoverStatus(new RoverStatus($newRoverStatus));
                break;
            case Direction::SOUTH:
                $newRoverStatus = $xPosition . " " . ($yPosition - 1) . " " . $headingDirection;
                $rover->setRoverStatus(new RoverStatus($newRoverStatus));
                break;
        }
    }
}
