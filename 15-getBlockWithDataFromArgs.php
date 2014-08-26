#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';
require_once 'blockData.php';


# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

$xPos = 0;
$yPos = 0;
$zPos = 0;

$numOfArgs = $argc - 1;
if ($numOfArgs == 3){
        $xPos = intval($argv[1]);
        $yPos = intval($argv[2]);
        $zPos = intval($argv[3]);
}else if($numOfArgs == 2){
     $xPos = intval($argv[1]);
     $zPos = intval($argv[2]);
     #Get the block that would be stood on at this Horiz posn
     $yPos = $mc->getHeight($xPos, $zPos) - 1;

}else{
    print("Number of arguments incorrect \n");
    print("Expected 2 or 3 arguments but got $numOfArgs \n");
    print("Usage with 3 args: php script.php xcoord ycoord zcoord\n");
    print("Usage with 2 args: php script.php xcoord zcoord\n");
    exit();
}

# Get the type of block for the highest point in world
# This is done at the passed in coords
$blockAndData = $mc->getBlockWithData($xPos, $yPos , $zPos);

$blockName = BlockData::getBlockNameFromId($blockAndData->id());
# Add to message, the type of block stood on
$message = "Block is of type ".$blockAndData->id()." which is ".$blockName;

# print to the php interpreter standard output (terminal probably)
print("$message\n");

# send message to the minecraft chat
$mc->postToChat($message);

$dataMessage = "Block data is ".$blockAndData->data();
print("$dataMessage\n");
$mc->postToChat($dataMessage);

$colourHash = BlockData::colourNameToId();
if ($blockAndData->id() === Block::WOOL()->id()){
    print("Is Wool Block - ");
    foreach ($colourHash as $colour => $idNum){
        if ($idNum === $blockAndData->data()){
            $colMsg = "Colour is $colour";
            print("$colMsg\n");
            $mc->postToChat($colMsg);
        }
    } 
}

?>
