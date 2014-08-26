#!/usr/bin/env php

<?php
error_reporting(E_ALL);
// Require and import the Minecraft module
require_once 'mcpi/minecraft.php';

/*    First thing you do is create a connection to minecraft
      This is like dialling a phone.
      It sets up a communication line between your script and the minecraft world
*/

// Create a connection to Minecraft
// Any communication with the world must require_once this object
$mc = Minecraft::create();

// Get the position of the Tile that the player is currently in
$playerPosition = $mc->player()->getTilePos();

// create the output message as a string
$message = "You are at (".$playerPosition->x().", ".$playerPosition->y().", ".$playerPosition->z().")";
      
// print to the php interpreter standard output (terminal probably)
echo("$message\n");

// send message to the minecraft chat
$mc->postToChat($message);

?>

