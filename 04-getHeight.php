#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';


//    First thing you do is create a connection to minecraft
//    This is like dialling a phone.
//    It sets up a communication line between your script and the minecraft world

// Create a connection to Minecraft
// Any communication with the world must require_once this object
$mc = Minecraft::create();

// Set default values for horizontral coordinates
$xPos = 0;
$zPos = 0;

// Check that have the appropriate number of command line arguments
//ARGV is a list of the command line arguments given
// It is zero indexed (the first element is at index 0)
$numOfArguments = $argc-1;
    
if ($numOfArguments == 2){
   $xPos = int($ARGV[1]);
   $zPos = int($ARGV[2]);
}else if ($numOfArguments == 0){
   //just require_once the player position
   $playerPos = $mc->player()->getTilePos();
   $xPos = $playerPos->x();
   $zPos = $playerPos->z();
}
else{
    print("Expected either none or two values as arguments for script, but received ".($numOfArguments)."\n");
    exit();
}

$height = $mc->getHeight($xPos, $zPos);
$message = "Height is $height";
echo("\n$message\n");
// send message to the minecraft chat
$mc->postToChat($message);


?>
