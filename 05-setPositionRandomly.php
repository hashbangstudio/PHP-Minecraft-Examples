#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';

#    First thing you do is create a connection to minecraft
#    This is like dialling a phone.
#    It sets up a communication line between your script and the minecraft world

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

$playerPos = $mc->player()->getTilePos();


$message = "You are at (".$playerPos->x().", ".$playerPos->z().")";
echo($message."\n");
# send message to the minecraft chat
$mc->postToChat($message);

# Set initial values for amount to shift horizontral coordinates by
# rand() creates a number between 0 and number given (defaults to 1 if none given) (inclusive) 
$xShift = rand(0,20)-10;
$zShift = rand(0,20)-10;

# Set variables for the new position
$newXpos = $playerPos->x() + $xShift;
$newZpos = $playerPos->z() + $zShift;

# Set y position to be the height of the world so not in middle of a block
$newYpos =  $mc->getHeight($newXpos, $newZpos);

# Set the position of the player
$mc->player()->setTilePos($newXpos, $newYpos, $newZpos);

$playerPos = $mc->player()->getTilePos();
$message = "You have been moved to (".$playerPos->x().", ".$playerPos->z().")";

echo($message."\n");
# send message to the minecraft chat
$mc->postToChat($message);


?>
