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

# define the position of the bottom left block of the wool row
$blockXposn   = $playerPosition->x() + 6;
$blockYposn   = $playerPosition->y() + 1;
$blockZposn   = $playerPosition->z() + 6;

# for value in the range 0 to 15 inclusive do the enclosed code
foreach(range(0,15)as $num){
    #increase the distance along the row that the block is placed at
    $blockXposn += 1;
    # $_ is a special variable automatically set by perl
    # it contains the value being used in  the current iteration of the loop
    # in this case the colour of the wool
    print("Creating block with data $num at ($blockXposn, $blockYposn, $blockZposn)\n");
    # Create a block
    $mc->setBlock($blockXposn, $blockYposn, $blockZposn, Block::WOOL()->withData($num));
}

?>
