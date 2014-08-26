#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';
require_once 'blockData.php';


# create a function to create a random block of wool
function getWoolBlockWithRandomColour(){
    #Generate a random number within the allowed range of colours 0-15
    # Random num generator is automatically seeded with srand() by php on first call
    $randomNumber = rand(0,16);
    print("Random number to be used = $randomNumber\n");
    $block = Block::WOOL()->withData($randomNumber);
    return $block;
}


# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the player position
$playerPosition = $mc->player()->getTilePos();

# define the position of the bottom left block of the wall
$blockXposn = $playerPosition->x() + 6;
$firstColumnX = $blockXposn;
$blockYposn = $playerPosition->y() + 1;
$blockZposn = $playerPosition->z() + 6;

# Create a wall using nested for loops
foreach(range(1,6) as $row){
    # increase the height of the current row to be built
    $blockYposn += 1;
    $blockXposn = $firstColumnX;
    foreach(range(1,10) as $column){
        #increase the distance along the row that the block is placed at
        $blockXposn += 1;
        print("Creating block at ($blockXposn, $blockYposn, $blockZposn)\n" );
        # Create a block
        $mc->setBlock($blockXposn, $blockYposn, $blockZposn, getWoolBlockWithRandomColour());
        time_nanosleep(0, 500000000);
    }
}

?>
