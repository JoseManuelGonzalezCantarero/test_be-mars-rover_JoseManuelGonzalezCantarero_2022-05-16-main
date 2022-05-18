<?php

namespace Rover\Domain\Coordinates;

use Psr\Log\InvalidArgumentException;

class InvalidCoordinatesPositionException extends InvalidArgumentException
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
