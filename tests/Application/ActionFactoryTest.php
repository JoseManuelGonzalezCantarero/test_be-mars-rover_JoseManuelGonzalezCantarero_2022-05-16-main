<?php

declare(strict_types=1);

namespace Rover\Tests\Application;

use PHPUnit\Framework\TestCase;
use Rover\Application\ActionFactory;
use Rover\Domain\Action\InvalidActionException;
use Rover\Domain\Action\Move;
use Rover\Domain\Action\SpinLeft;
use Rover\Domain\Action\SpinRight;

final class ActionFactoryTest extends TestCase
{
    public function testMoveActionIsCreated()
    {
        $move = (new ActionFactory())->createAction('M');
        $this->assertTrue($move instanceof Move);
    }

    public function testSpinLeftIsCreated()
    {
        $spinLeft = (new ActionFactory())->createAction('L');
        $this->assertTrue($spinLeft instanceof SpinLeft);
    }

    public function testSpinRightIsCreated()
    {
        $spinRight = (new ActionFactory())->createAction('R');
        $this->assertTrue($spinRight instanceof SpinRight);
    }

    public function testInvalidExceptionWhenWrongAction()
    {
        $this->expectException(InvalidActionException::class);
        (new ActionFactory())->createAction("S");
    }
}
