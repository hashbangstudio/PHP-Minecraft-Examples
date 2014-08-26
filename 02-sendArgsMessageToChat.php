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

// Check that have the appropriate number of command line arguments (one in this case)
//$argv is a list of the command line arguments given including name of the script
//$argc -q is the number of arguments given
$numOfArguments = $argc-1;

if ($numOfArguments == 1){
    // create the output message as a string
    $message = $argv[1];
    // print to the php interpreter standard output (terminal probably)
    echo($message."\n");
    // send message to the minecraft chat
    $mc->postToChat($message);
} else{
        print("Expected only one string as argument for script, but received $numOfArguments\n");
}

?>
