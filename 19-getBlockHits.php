#!/usr/bin/env php

<?php
error_reporting(E_ALL);

# We have to import the minecraft api module to do anything in the minecraft world
require_once 'mcpi/minecraft.php';

    
# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

while(1){
    $hits = $mc->events()->pollBlockHits();
    //var_dump($hits);
    $numOfHits = count($hits);
   # print("$numOfHits\n");
    if ($numOfHits > 0){
        foreach($hits as $hit){
            print "$hit\n";
        }
    }
}

?>
