#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';

#$argv is a list of the command line arguments given and the script name
#$argc is the number of command line arguments given + 1
$numOfArguments = $argc -1;

if ($numOfArguments == 2){

    # Create a connection to Minecraft
    # Any communication with the world must require_once this object
    $mc = Minecraft::create();
    $playerPos = $mc->player()->getTilePos();

    #create a message to send
    $message = "You are at (".$playerPos->x().", ".$playerPos->y().", ".$playerPos->z().")";
    echo ($message."\n");
    # send message to the minecraft chat
    $mc->postToChat($message);
    
    # Set variables for the new position
    $newXpos = intval($argv[1]);
    $newZpos = intval($argv[2]);
    
    # Set y position to be the height of the world so not in middle of a block
    $newYpos =  $mc->getHeight($newXpos, $newZpos);

    # Set the position of the player
    $mc->player()->setTilePos($newXpos, $newYpos, $newZpos);
    # Get the current position that the player is located at in the world
    $playerPos = $mc->player()->getTilePos();
    $message = "You have been moved to  (".$playerPos->x().", ".$playerPos->y().", ".$playerPos->z().")";

    echo ($message."\n");
    # send message to the minecraft chat
    $mc->postToChat($message);
}
else{
    print("Expected two values arguments for script, but received ".($numOfArguments)."\n");
    print("Usage: php script.php xCoord zCoord");
    print("Example usage: php script.php 9 -8");
    exit();
}


?>
