<?php

declare(strict_types=1);

namespace Rover\Domain\Action;

use Rover\Domain\Rover\Rover;

interface ActionInterface
{
    public function execute(Rover $rover): void;
}
