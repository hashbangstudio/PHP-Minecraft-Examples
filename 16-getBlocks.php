#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';
require_once 'blockData.php';

#
#             NOTE THAT THE getBlocks() FUNCTION IS BUGGED IN THE API
#             THIS EXAMPLE WILL NOT WORK
#

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the current tile/block that the player is located at in the world
$playerPosition = $mc->player()->getTilePos();

$height = $mc->getHeight($playerPosition->x(), $playerPosition->z());
# create the output message as a string
$message = " height is $height";

# Get the type of block for the highest point in world at horiz player posn
$blocksInCuboid = $mc->getBlocks($playerPosition->x(), $height, $playerPosition->z(), 
                              $playerPosition->x() + 10, $height, $playerPosition->z() + 10);

print($blocksInCuboid);

# print to the php interpreter standard output (terminal probably)
print($message);

# send message to the minecraft chat
$mc->postToChat($message);

?>
