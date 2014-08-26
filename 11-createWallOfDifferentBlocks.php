#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';


# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the player position
$playerPosition = $mc->player()->getTilePos();

# define the position of the bottom left block of the wall
$blockXposn   = $playerPosition->x() + 6;
$firstColumnX = $blockXposn;
$blockYposn   = $playerPosition->y() + 1;
$blockZposn   = $playerPosition->z() + 6;

# id of block to create
$id = 0;

# Create a wall using nested for loops
foreach (range(1,6) as $row){
    # increase the height of the current row to be built
    $blockYposn += 1;
    $blockXposn = $firstColumnX;
    foreach(range(1,10) as $column){
        #increase the distance along the row that the block is placed at
        $blockXposn += 1;
        print("Creating block with id = $id at ($blockXposn, $blockYposn, $blockZposn)\n");
        # Create a block
        # If the id doesn't exist in the Minecraft world
        # The message will still be sent but no block will be created
        #$mc->setBlock($blockXposn, $blockYposn, $blockZposn, new Block($id));
        $mc->setBlock($blockXposn, $blockYposn, $blockZposn, $id); //Alternative method
        # Wait for 0.5 seconds
        time_nanosleep(0, 500000000);
        # increment the id of the block to create
        $id += 1;
    }
}

?>
