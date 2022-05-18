<?php

declare(strict_types=1);

namespace Rover\Domain;

use Rover\Domain\Coordinates\Coordinates;

final class Plateau
{
    private const LOWER_LEFT_COORDINATE = 0;

    private Coordinates $minLeftBorder;
    private Coordinates $maxRightBorder;

    public function __construct(Coordinates $coordinates)
    {
        $this->minLeftBorder = new Coordinates(self::LOWER_LEFT_COORDINATE, self::LOWER_LEFT_COORDINATE);
        $this->maxRightBorder = $coordinates;
    }

    public function getMinLeftBorder(): Coordinates
    {
        return $this->minLeftBorder;
    }

    public function getMaxRightBorder(): Coordinates
    {
        return $this->maxRightBorder;
    }
}
