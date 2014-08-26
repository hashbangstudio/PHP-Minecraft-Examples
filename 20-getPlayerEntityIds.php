#!/usr/bin/env php

<?php
error_reporting(E_ALL);

# We have to import the minecraft api module to do anything in the minecraft world
require_once 'mcpi/minecraft.php';


# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

$allIds = $mc->getPlayerEntityIds();
$message = "";
# create the output message as a string
foreach ($allIds as $id){
    $message = "id is $id";
    # print to the php interpreter standard output (terminal probably)
    print($message);
    # send message to the minecraft chat
    $mc->postToChat($message);
}

?>
