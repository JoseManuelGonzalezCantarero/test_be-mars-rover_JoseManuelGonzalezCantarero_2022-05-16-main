<?php

namespace Rover\Domain\Direction;

use Psr\Log\InvalidArgumentException;

class InvalidDirectionException extends InvalidArgumentException
{
    public function __construct(private string $headingDirection = "")
    {
        parent::__construct();
    }

    public function errorMessage(): string
    {
        return sprintf('Meeeeeh, this <%s> cardinal point is not valid!', $this->headingDirection);
    }
}
