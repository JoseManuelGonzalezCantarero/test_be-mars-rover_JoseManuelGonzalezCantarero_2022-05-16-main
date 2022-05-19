<?php

declare(strict_types=1);

use Rover\Domain\Action\InvalidActionException;
use Rover\Domain\Coordinate\Coordinate;
use Rover\Domain\Coordinate\InvalidCoordinatePositionException;
use Rover\Domain\Direction\InvalidDirectionException;
use Rover\Domain\Plateau;
use Rover\Domain\Rover\Rover;
use Rover\Domain\Rover\RoverStatus;
use Rover\Domain\Service\ActionsInput;

require_once __DIR__ . '/vendor/autoload.php';

$plateauData = fgets(STDIN);
$plateauSize = explode(" ", $plateauData);

try {
    $coordinate = new Coordinate((int)$plateauSize[0], (int)$plateauSize[1]);
    $plateau = new Plateau($coordinate);
} catch (InvalidCoordinatePositionException $invalidCoordinatePositionException) {
    echo $invalidCoordinatePositionException->errorMessage();
    return;
}

$inputActionLine = 0;

try {
    $rover = new Rover();
    while (false !== ($inputData = fgets(STDIN))) {
        if (0 === $inputActionLine) {
            $rover->setRoverStatus(new RoverStatus($inputData));
            $inputActionLine++;
        } elseif ($inputActionLine == 1) {
            $rover->setActions((new ActionsInput($inputData))->getActions());
            $inputActionLine = 0;
        }
    }

    $rover->execute();
    echo $rover->getRoverStatusAsString();
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
