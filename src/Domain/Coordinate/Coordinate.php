<?php

declare(strict_types=1);

namespace Rover\Domain\Coordinate;

final class Coordinate
{
    public function __construct(private int $x, private int $y)
    {
        if (-1 >= $x || -1 >= $y) {
            throw new InvalidCoordinatePositionException();
        }
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}
