#!/usr/bin/env php

<?php
error_reporting(E_ALL);

// Require and include the Minecraft module
require_once 'mcpi/minecraft.php';

//    First thing you do is create a connection to minecraft
//    This is like dialling a phone.
//    It sets up a communication line between your script and the minecraft world

// Create a connection to Minecraft
// Any communication with the world must require_once this object
$mc = Minecraft::create();

// Get the position that the player is currently at
$playerPosition = $mc->player()->getPos();

//format the output so that is one decimal place
$message = sprintf("You are at (%.1f, %.1f, %.1f)", $playerPosition->x(), $playerPosition->y(), $playerPosition->z());
      
// print to the php interpreter standard output (terminal probably)
echo("$message\n");

// send message to the minecraft chat
$mc->postToChat($message);

?>
