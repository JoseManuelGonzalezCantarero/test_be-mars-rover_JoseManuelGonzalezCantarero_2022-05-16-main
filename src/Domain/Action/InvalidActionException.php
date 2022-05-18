<?php

declare(strict_types=1);

namespace Rover\Domain\Action;

use Psr\Log\InvalidArgumentException;

final class InvalidActionException extends InvalidArgumentException
{
    public function __construct(private string $action = "")
    {
        parent::__construct();
    }

    public function errorMessage(): string
    {
        return sprintf('Emmm, I\'m not a Boston Dynamic robot, so I don\'t know what <%s> means', $this->action);
    }
}
