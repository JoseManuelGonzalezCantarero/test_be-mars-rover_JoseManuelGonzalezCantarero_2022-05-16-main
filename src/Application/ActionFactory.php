<?php

declare(strict_types=1);

namespace Rover\Application;

use Rover\Domain\Action\ActionInterface;
use Rover\Domain\Action\InvalidActionException;
use Rover\Domain\Action\Move;
use Rover\Domain\Action\SpinLeft;
use Rover\Domain\Action\SpinRight;

final class ActionFactory
{
    public const VALID_ACTIONS = [
        'M',
        'L',
        'R'
    ];

    public function createAction(string $actionType): ActionInterface
    {
        if (in_array($actionType, self::VALID_ACTIONS)) {
            if ('M' === $actionType) {
                return new Move();
            }

            if ('L' === $actionType) {
                return new SpinLeft();
            }

            if ('R' === $actionType) {
                return new SpinRight();
            }
        }

        throw new InvalidActionException($actionType);
    }
}
