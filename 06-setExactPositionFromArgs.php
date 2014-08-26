#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';

#$argv is a list of the command line arguments given
#$argc -1 is the number of arguments
$numOfArguments = $argc - 1;

if ($numOfArguments == 2){
    # Create a connection to Minecraft
    # Any communication with the world must require_once this object
    $mc = Minecraft::create();

    $playerPosition = $mc->player()->getPos();

    #create a message to send
    #format the output so that is one decimal place
    $message = sprintf("You are at (%.1f, %.1f, %.1f)", $playerPosition->x(), $playerPosition->y(), $playerPosition->z());
    print("$message\n");
    # send message to the minecraft chat
    $mc->postToChat($message);

    # Set variables for the new position
    $newXpos = $argv[1];
    $newZpos = $argv[2];
    
    # Set y position to be the height of the world so not in middle of a block
    $newYpos =  $mc->getHeight($newXpos, $newZpos);

    # Set the position of the player
    $mc->player()->setPos($newXpos, $newYpos, $newZpos);
    # Get the current position that the player is located at in the world
    $playerPosition = $mc->player()->getPos();
    #format the output so that is one decimal place
    $message = sprintf("have been moved to (%.1f, %.1f, %.1f)", $playerPosition->x(), $playerPosition->y(), $playerPosition->z()) ;
    print ($message."\n");
    # send message to the minecraft chat
    $mc->postToChat($message);
}
else{
    print("Expected two values arguments for script, but received ".($numOfArguments)."\n");
    print("Usage: php script.php xCoord zCoord");
    print("Example usage: php script.php 9.2 8.5");
    exit();
}


?>
