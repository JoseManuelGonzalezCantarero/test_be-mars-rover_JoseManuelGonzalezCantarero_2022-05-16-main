<?php

declare(strict_types=1);

namespace Rover\Domain;

final class Rover
{

    private string $direction;

    public function __construct(private int $xAxis, private int $yAxis, private string $headingDirection)
    {
    }

    public function getX(): int
    {
        return $this->xAxis;
    }

    public function getY(): int
    {
        return $this->yAxis;
    }

    public function getHeadingDirection(): string
    {
        return $this->headingDirection;
    }

    public function setMovement(string $move): void
    {
        if ('M' === $move) {
            $this->yAxis += 1;
        }
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}