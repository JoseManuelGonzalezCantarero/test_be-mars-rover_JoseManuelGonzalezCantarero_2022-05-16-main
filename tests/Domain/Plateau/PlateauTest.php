<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Plateau;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Coordinate\Coordinate;
use Rover\Domain\Plateau\Plateau;

final class PlateauTest extends TestCase
{
    public function setUp(): void
    {
        $position = new Coordinate(5, 6);
        $this->plateau = new Plateau($position);
    }

    public function testHaveMinCoordinateToXAxis()
    {
        $this->assertSame(0, $this->plateau->getMinLeftBorder()->getX());
    }

    public function testHaveMinCoordinateToYAxis()
    {
        $this->assertSame(0, $this->plateau->getMinLeftBorder()->getY());
    }

    public function testHaveMaxCoordinateToXAxis()
    {
        $this->assertSame(5, $this->plateau->getMaxRightBorder()->getX());
    }

    public function testHaveMaxCoordinateToYAxis()
    {
        $this->assertSame(6, $this->plateau->getMaxRightBorder()->getY());
    }
}
