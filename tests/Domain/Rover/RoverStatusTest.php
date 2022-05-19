<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Coordinate\Coordinate;
use Rover\Domain\Coordinate\InvalidCoordinatePositionException;
use Rover\Domain\Direction\Direction;
use Rover\Domain\Direction\InvalidDirectionException;
use Rover\Domain\Rover\RoverStatus;

final class RoverStatusTest extends TestCase
{
    public function setUp(): void
    {
        $this->roverStatus = new RoverStatus('1 2 N');
    }

    public function testValidRoverStatusInput()
    {
        $this->assertTrue(
            $this->roverStatus->getPosition() instanceof Coordinate &&
            $this->roverStatus->getDirection() instanceof Direction
        );
    }

    public function testValidRoverStatusOutput()
    {
        $this->assertEquals('1 2 N', $this->roverStatus->getRoverStatusAsString());
    }

    public function testInvalidRoverStatusInputPosition()
    {
        $this->expectException(InvalidCoordinatePositionException::class);
        $this->roverStatus = new RoverStatus('1 -2 N');
    }

    public function testInvalidRoverStatusInputDirection()
    {
        $this->expectException(InvalidDirectionException::class);
        $this->roverStatus = new RoverStatus('1 2 P');
    }
}
