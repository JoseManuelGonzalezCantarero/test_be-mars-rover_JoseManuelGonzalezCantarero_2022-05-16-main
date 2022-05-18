<?php

declare(strict_types=1);

namespace Rover\Domain;

final class Plateau
{
    public function __construct(private int $xAxis, private int $yAxis)
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
}