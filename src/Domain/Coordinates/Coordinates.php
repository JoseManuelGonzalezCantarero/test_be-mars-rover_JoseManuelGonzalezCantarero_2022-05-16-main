<?php

declare(strict_types=1);

namespace Rover\Domain\Coordinates;

final class Coordinates
{
    public function __construct(private int $x, private int $y)
    {
        if (-1 >= $x || -1 >= $y) {
            throw new InvalidCoordinatesPositionException();
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
