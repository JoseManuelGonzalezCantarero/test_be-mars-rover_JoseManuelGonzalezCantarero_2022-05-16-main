<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Action;

use PHPUnit\Framework\TestCase;
use Rover\Application\ActionFactory;
use Rover\Domain\Action\Actions;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class MoveTest extends TestCase
{
    public function testRoverCanMove()
    {
        $actions = new Actions();
        $moveForward = (new ActionFactory())->createAction('M');
        $actions->append($moveForward);

        $rover = new Rover();
        $roverStatus = new RoverStatus('1 2 W');
        $rover->setRoverStatus($roverStatus);
        $rover->setActions($actions);
        $rover->execute();

        $this->assertSame('0 2 W', $rover->getRoverStatusAsString());
    }
}
