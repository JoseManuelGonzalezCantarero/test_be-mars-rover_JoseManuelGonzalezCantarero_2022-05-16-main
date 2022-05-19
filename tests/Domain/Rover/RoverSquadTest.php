<?php

declare(strict_types=1);

namespace Rover\Tests\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverSquad;
use Rover\Domain\Rover\RoverStatus;
use Rover\Domain\Service\ActionsInput;

final class RoverSquadTest extends TestCase
{
    public function setUp(): void
    {
        $this->roverSquad = new RoverSquad();

        $this->rover = new Rover();
        $this->rover->setRoverStatus(new RoverStatus('1 2 N'));
        $this->rover->setActions((new ActionsInput('L M L M L M L M M'))->getActions());

        $this->anotherRover = new Rover();
        $this->anotherRover->setRoverStatus(new RoverStatus('3 3 E'));
        $this->anotherRover->setActions((new ActionsInput('M M R M M R M R R M'))->getActions());
    }

    public function testValidOutputOnlyOneRover()
    {
        $this->roverSquad->offsetSet(0, $this->rover);
        $this->roverSquad->execute();

        $this->assertSame('1 3 N', $this->roverSquad->getRoverSquadStatusAsString());
    }

    public function testValidOutputWithTwoRover()
    {
        $this->roverSquad->offsetSet(0, $this->rover);
        $this->roverSquad->offsetSet(1, $this->anotherRover);
        $this->roverSquad->execute();

        $this->assertSame("1 3 N\n5 1 E", $this->roverSquad->getRoverSquadStatusAsString());
    }
}
