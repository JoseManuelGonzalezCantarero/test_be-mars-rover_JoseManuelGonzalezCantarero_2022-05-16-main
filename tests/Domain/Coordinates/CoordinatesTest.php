<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Coordinates;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Coordinates\Coordinates;
use Rover\Domain\Coordinates\InvalidCoordinatesPositionException;

final class CoordinatesTest extends TestCase
{
    public function setUp(): void
    {
        $this->position = new Coordinates(1, 2);
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
        $this->expectException(InvalidCoordinatesPositionException::class);
        new Coordinates(-1, 2);
    }
}
