<?php

declare(strict_types=1);

namespace Rover\Domain\Service;

use Rover\Application\ActionFactory;
use Rover\Domain\Action\Actions;

final class ActionsInput
{
    private Actions $actions;

    public function __construct(string $actionsInput)
    {
        $actionFactory = new ActionFactory();
        $this->actions = new Actions();

        $actions = explode(" ", $actionsInput);

        foreach ($actions as $action) {
            $this->actions->append($actionFactory->createAction($action));
        }
    }

    public function getActions(): Actions
    {
        return $this->actions;
    }
}
