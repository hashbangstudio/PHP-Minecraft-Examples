#!/usr/bin/env php

<?php
error_reporting(E_ALL);


require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';


#    First thing you do is create a connection to minecraft
#    This is like dialling a phone.
#    It sets up a communication line between your script and the minecraft world

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

# Get the player position
$playerPosition = $mc->player()->getTilePos();

$wallStartXposn = $playerPosition->x() + 6;
$wallStartYposn = $playerPosition->y() + 1;
$wallZposn      = $playerPosition->z() + 6;

$wallEndXposn = $wallStartXposn + 10;
$wallEndYposn = $wallStartYposn + 6;

# Create a wall
$mc->setBlocks($wallStartXposn , $wallStartYposn, $wallZposn,
               $wallEndXposn,    $wallEndYposn,   $wallZposn,
               Block::DIAMOND_BLOCK());
               

?>
