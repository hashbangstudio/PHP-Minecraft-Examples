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

echo("Please enter text to send to chat: ");
$message = trim(fgets(STDIN));
// print to the php interpreter standard output (terminal probably)
echo($message."\n");
// send message to the minecraft chat
$mc->postToChat($message);

?>
