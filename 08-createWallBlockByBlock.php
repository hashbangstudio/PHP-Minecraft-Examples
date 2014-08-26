#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';


# Create a connection to the Minecraft game
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the player position
$playerPosition = $mc->player()->getTilePos();

# define the position of the first block
$blockXposn = $playerPosition->x() + 6;
$firstColumnX = $blockXposn;
$blockYposn = $playerPosition->y()+ 1;
$blockZposn = $playerPosition->z() + 6;

#For all the values (rows) 1,2,3,4,5,6 do the enclosed code block
foreach (range(1,6)as $row){
    # increase the height of the current row to be built
    $blockYposn += 1; 
    $blockXposn = $firstColumnX;
    #for all the values (columns) 1,2,3,4,5,6,7,8,9,10 do the enclosed code block
    foreach(range(1,10) as $column){
        #increase the distance along the row that the block is placed at
        $blockXposn += 1;
        print("Creating block at ($blockXposn, $blockYposn, $blockZposn)\n");
        # Create a block
        $mc->setBlock($blockXposn, $blockYposn, $blockZposn, Block::DIAMOND_BLOCK());
        # Wait for 0.5 seconds func(seconds,nanoseconds) 
        #sleep() only accepts integer number of seconds
        time_nanosleep(0, 500000000);
    }
}


?>
