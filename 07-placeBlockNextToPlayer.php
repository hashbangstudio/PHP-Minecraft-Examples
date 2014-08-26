#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';

# Any communication with the world must require_once this object
# Create a connection to the Minecraft game
$mc = Minecraft::create();

# Get the player position
$playerPosition = $mc->player()->getTilePos();

# define the position of the block
$blockXposn = $playerPosition->x() + 1;
$blockYposn = $playerPosition->y() + 1;
$blockZposn = $playerPosition->z() + 1;


$message = "Creating block at ($blockXposn, $blockYposn, $blockZposn)\n";

print($message."\n");
var_dump(Block::DIAMOND_BLOCK());
# Create a block
$mc->setBlock($blockXposn, $blockYposn, $blockZposn, Block::DIAMOND_BLOCK());

?>
