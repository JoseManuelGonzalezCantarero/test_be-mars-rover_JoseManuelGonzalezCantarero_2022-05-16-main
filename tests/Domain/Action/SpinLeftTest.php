<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Action;

use PHPUnit\Framework\TestCase;
use Rover\Application\ActionFactory;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;

final class SpinLeftTest extends TestCase
{
    public function testRoverCanTurnLeft()
    {
        $rover = new Rover();
        $rover->setRoverStatus(new RoverStatus("3 4 W"));

        $spinLeft = (new ActionFactory())->createAction("L");
        $spinLeft->execute($rover);

        $this->assertSame("S", $rover->getRoverStatus()->getDirection()->getHeadingDirection());
    }
}
