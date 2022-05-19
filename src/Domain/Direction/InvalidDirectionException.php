<?php

declare(strict_types=1);

namespace Rover\Domain\Direction;

use Psr\Log\InvalidArgumentException;

final class InvalidDirectionException extends InvalidArgumentException
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
