<?php

namespace Rover\Tests\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Coordinates\Coordinates;
use Rover\Domain\Coordinates\InvalidCoordinatesPositionException;
use Rover\Domain\Direction\Direction;
use Rover\Domain\Direction\InvalidDirectionException;
use Rover\Domain\Rover\RoverStatus;

class RoverStatusTest extends TestCase
{
    public function setUp(): void
    {
        $this->roverStatus = new RoverStatus('1 2 N');
    }

    public function testValidRoverStatusInput()
    {
        $this->assertTrue(
            $this->roverStatus->getPosition() instanceof Coordinates &&
            $this->roverStatus->getDirection() instanceof Direction
        );
    }

    public function testValidRoverStatusOutput()
    {
        $this->assertEquals('1 2 N', $this->roverStatus->getRoverStatusAsString());
    }

    public function testInvalidRoverStatusInputPosition()
    {
        $this->expectException(InvalidCoordinatesPositionException::class);
        $this->roverStatus = new RoverStatus('1 -2 P');
    }

    public function testInvalidRoverStatusInputDirection()
    {
        $this->expectException(InvalidDirectionException::class);
        $this->roverStatus = new RoverStatus('1 2 P');
    }
}
