<?php

declare(strict_types=1);

namespace Rover\Domain\Direction;

final class Direction
{
    public const NORTH = "N";
    public const WEST = "W";
    public const EAST = "E";
    public const SOUTH = "S";

    public function __construct(private string $headingDirection)
    {
        $headingDirection = trim(strtoupper($headingDirection));

        if ($this->isValidCardinalPoint($headingDirection)) {
            $this->headingDirection = $headingDirection;
            return;
        }

        throw new InvalidDirectionException($headingDirection);
    }

    public function getHeadingDirection(): string
    {
        return $this->headingDirection;
    }

    private function isValidCardinalPoint(string $headinDirection): bool
    {
        return in_array(
            $headinDirection,
            [
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }
}
