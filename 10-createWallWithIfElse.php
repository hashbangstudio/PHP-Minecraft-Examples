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


# Create a wall using nested for loops
foreach (range(1,6) as $row){
    # increase the height of the current row to be built
    $blockYposn += 1;
    $blockXposn = $firstColumnX;
    foreach(range(1,10) as $column){
        #increase the distance along the row that the block is placed at
        $blockXposn += 1;
        print("Creating block at ($blockXposn, $blockYposn, $blockZposn) \n");
        # Create the block
        if (($row == 3) and ($column == 3)){
            # create the Glowing obsisian block only on 3rd row in 3rd column
            $mc->setBlock($blockXposn, $blockYposn, $blockZposn, Block::GLOWING_OBSIDIAN());
        }else{
            $mc->setBlock($blockXposn, $blockYposn, $blockZposn, Block::DIAMOND_BLOCK());
        }
        #wait for 0.5 seconds
        time_nanosleep(0, 500000000);
    }
}

?>
