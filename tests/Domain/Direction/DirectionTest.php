<?php

namespace Rover\Tests\Domain\Direction;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Direction\Direction;
use Rover\Domain\Direction\InvalidDirectionException;

final class DirectionTest extends TestCase
{
    public function testValidDirection()
    {
        $headingDirection = new Direction('N');
        $this->assertTrue($headingDirection instanceof Direction);
    }

    public function testInvalidExceptionWhenWrongHeadDirection()
    {
        $this->expectException(InvalidDirectionException::class);
        new Direction("NW");
    }
}
