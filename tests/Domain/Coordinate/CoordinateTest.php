<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Coordinate;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Coordinate\Coordinate;
use Rover\Domain\Coordinate\InvalidCoordinatePositionException;

final class CoordinateTest extends TestCase
{
    public function setUp(): void
    {
        $this->position = new Coordinate(1, 2);
    }

    public function testCanHandleInputReturningIntegerToXPosition()
    {
        $this->assertSame(1, $this->position->getX());
    }

    public function testCanHandleInputReturningIntegerToYPosition()
    {
        $this->assertSame(2, $this->position->getY());
    }

    public function testInvalidPositionPoints()
    {
        $this->expectException(InvalidCoordinatePositionException::class);
        new Coordinate(-1, 2);
    }
}
