<?php

declare(strict_types=1);

namespace Rover\Tests\Domain;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Rover;

final class RoverTest extends TestCase
{

    public function setUp(): void
    {
        $this->rover = new Rover(1, 2, 'N');
    }

    public function testRoverHaveInitialPosition(): void
    {
        $this->assertSame(1, $this->rover->getX());
        $this->assertSame(2, $this->rover->getY());
        $this->assertSame('N', $this->rover->getHeadingDirection());
    }

    public function testRoverTurnLeft(): void
    {
        $this->rover->setDirection('L');
        $this->assertSame('L', $this->rover->getDirection());
    }

    public function testRoverTurnRight(): void
    {
        $this->rover->setDirection('R');
        $this->assertSame('R', $this->rover->getDirection());
    }

    public function testRoverMove(): void
    {
        $this->rover->setMovement('M');
        $this->assertSame(3, $this->rover->getY());
    }
}