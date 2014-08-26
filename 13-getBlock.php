#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';
require_once 'blockData.php';

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the current tile/block that the player is located at in the world
$playerPosition = $mc->player()->getTilePos();

$height = $mc->getHeight($playerPosition->x(), $playerPosition->z());
# create the output message as a string
$message = "Height is $height";

# print to the php interpreter standard output (terminal probably)
print("$message\n");

# send message to the minecraft chat
$mc->postToChat($message);


# Get the type of block for the highest point in world
# This is done at the horizonal player posn
$blockIdNum = $mc->getBlock($playerPosition->x(), $height , $playerPosition->z());


if ($blockIdNum == Block::AIR()->id()){
     # Need to do height minus one for this as not flower etc
     $blockIdNum = $mc->getBlock($playerPosition->x(), $height -1 , $playerPosition->z());
}

$blockName = BlockData::getBlockNameFromId($blockIdNum);

# Add to message, the type of block stood on
$message = "Block is of type $blockIdNum which is $blockName";

# print to the php interpreter standard output (terminal probably)
print("$message\n");

# send message to the minecraft chat
$mc->postToChat($message);



?>
