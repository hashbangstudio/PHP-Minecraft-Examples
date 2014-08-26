#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';

$numOfArgs = $argc - 1;

if ($numOfArgs == 1 or $numOfArgs == 2) {

    # Create a connection to the Minecraft game
    $mc = Minecraft::create();

    # Get the player position
    $playerPosition = $mc->player()->getTilePos();

    # Set coordinates (position) for the block that is slightly away from the player
    # Note y is the vertical coordinate, x and z the horizontal
    $blockXposn = $playerPosition->x() + 1;
    $blockZposn = $playerPosition->z() + 1;
    # set the y coordinate to be at the height of the world at the (x,z) horisontal coordinate
    $blockYposn = $mc->getHeight($blockXposn, $blockZposn);

    $blockToPlace = Block::AIR();

    #remove any trailing and starting brackets and split on commas
    $blockText = str_replace(array('(',')', '[',']','{'.'}'), "", $argv[1]);
    $blockArgs = explode("," , $blockText);

    $blockId = intval($blockArgs[0]);
    $blockData = intval($blockArgs[1]);

    $blockToPlace = new Block($blockId,$blockData);
    
    if ($numOfArgs == 2){
        $coordText = str_replace(array('(',')', '[',']','{'.'}'),"", $argv[2]);
        $coords = explode(',', $coordText);
        #Ensure require_once integers and not fractional/decimal numbers
        $blockXposn = intval($coords[0]);
        $blockYposn = intval($coords[1]);
        $blockZposn = intval($coords[2]);
    }
}else{
    print("To place block next to player:\n");
    print("Usage : php script.php blockId,blockData\n");
    print("To place block at a specific coordinate\n");
    print("Usage : php script.php blockId,blockData x,y,z\n");
    print("Expected 1 or 2 aguments but received $numOfArgs\n");
    exit();
}

print ("Placing block at ($blockXposn, $blockYposn, $blockZposn)\n");

$mc->setBlock($blockXposn, $blockYposn, $blockZposn, $blockToPlace);


?>
