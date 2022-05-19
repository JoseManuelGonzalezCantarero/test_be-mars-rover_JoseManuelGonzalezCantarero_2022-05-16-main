<?php

declare(strict_types=1);

namespace Rover\Domain\Plateau;

use Rover\Domain\Coordinate\Coordinate;

final class Plateau
{
    private const LOWER_LEFT_COORDINATE = 0;

    private Coordinate $minLeftBorder;
    private Coordinate $maxRightBorder;

    public function __construct(Coordinate $coordinates)
    {
        $this->minLeftBorder = new Coordinate(self::LOWER_LEFT_COORDINATE, self::LOWER_LEFT_COORDINATE);
        $this->maxRightBorder = $coordinates;
    }

    public function getMinLeftBorder(): Coordinate
    {
        return $this->minLeftBorder;
    }

    public function getMaxRightBorder(): Coordinate
    {
        return $this->maxRightBorder;
    }
}
