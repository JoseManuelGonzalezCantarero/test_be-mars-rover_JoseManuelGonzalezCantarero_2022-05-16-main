<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Service;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Action\Actions;
use Rover\Domain\Service\ActionsInput;

final class ActionsInputTest extends TestCase
{
    public function testValidInputToActions()
    {
        $actions = new ActionsInput('M M L M M R');
        $this->assertTrue($actions->getActions() instanceof Actions);
    }
}
