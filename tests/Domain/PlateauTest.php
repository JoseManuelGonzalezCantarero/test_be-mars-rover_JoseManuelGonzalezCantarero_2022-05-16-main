<?php

declare(strict_types=1);

namespace Rover\Tests\Domain;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Plateau;

final class PlateauTest extends TestCase
{
    public function testPlateuHaveCoordinates(): void
    {
        $plateau = new Plateau(5, 5);
        $this->assertSame(5, $plateau->getX());
        $this->assertSame(5, $plateau->getY());
    }
}