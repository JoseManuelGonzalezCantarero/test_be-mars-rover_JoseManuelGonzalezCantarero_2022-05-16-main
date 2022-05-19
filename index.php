<?php

declare(strict_types=1);

use Rover\Domain\Action\InvalidActionException;
use Rover\Domain\Coordinate\Coordinate;
use Rover\Domain\Coordinate\InvalidCoordinatePositionException;
use Rover\Domain\Direction\InvalidDirectionException;
use Rover\Domain\Plateau\Plateau;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverSquad;
use Rover\Domain\Rover\RoverStatus;
use Rover\Domain\Service\ActionsInput;

require_once __DIR__ . '/vendor/autoload.php';

$plateauData = fgets(STDIN);
$plateauSize = explode(" ", $plateauData);

try {
    $coordinate = new Coordinate((int)$plateauSize[0], (int)$plateauSize[1]);
    $plateau = new Plateau($coordinate);
    $roverSquad = new RoverSquad();
} catch (InvalidCoordinatePositionException $invalidCoordinatePositionException) {
    echo $invalidCoordinatePositionException->errorMessage();
    return;
}

$inputActionLine = 0;
$roverSquadCounter = 0;

try {
    while (false !== ($inputData = fgets(STDIN))) {
        if (0 === $inputActionLine) {
            if (false === $roverSquad->offsetExists($roverSquadCounter)) {
                $rover = new Rover();
                $rover->setRoverStatus(new RoverStatus(trim($inputData)));
                $roverSquad->offsetSet($roverSquadCounter, $rover);
            }
            $inputActionLine++;
        } elseif (1 === $inputActionLine && $roverSquad->offsetExists($roverSquadCounter)) {
            $rover = $roverSquad->offsetGet($roverSquadCounter);
            $rover->setActions((new ActionsInput(trim($inputData)))->getActions());
            $inputActionLine = 0;
            $roverSquadCounter++;
        }
    }

    $roverSquad->execute();
    echo $roverSquad->getRoverSquadStatusAsString();
} catch (InvalidDirectionException $invalidDirectionException) {
    echo $invalidDirectionException->errorMessage();
    return;
} catch (InvalidActionException $invalidActionException) {
    echo $invalidActionException->errorMessage();
    return;
} catch (InvalidCoordinatePositionException $invalidCoordinatePositionException) {
    echo $invalidCoordinatePositionException->errorMessage();
    return;
}
