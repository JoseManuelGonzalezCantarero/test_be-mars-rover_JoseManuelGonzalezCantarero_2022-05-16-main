<?php

declare(strict_types=1);

namespace Rover\Domain\Coordinate;

use Psr\Log\InvalidArgumentException;

final class InvalidCoordinatePositionException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorMessage(): string
    {
        return 'Eeeeyyy, this point position is not valid! Give some positive numbers please!';
    }
}
