<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class RoverTest extends TestCase
{
    public function setUp(): void
    {
        $this->rover = new Rover();
    }

    public function testRoverHaveInitialPosition(): void
    {
        $this->rover->setRoverStatus(new RoverStatus('1 2 N'));
        $this->assertTrue($this->rover->getRoverStatus() instanceof RoverStatus);
    }
}
