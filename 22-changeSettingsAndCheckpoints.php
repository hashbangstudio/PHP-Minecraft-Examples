#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';
require_once 'mcpi/block.php';



function sendToChatAndConsole($minecraft, $message){
 # print to the php interpreter standard output (terminal probably)
    print($message."\n");
    # send message to the minecraft chat
    $minecraft->postToChat($message);
}

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();


sendToChatAndConsole($mc, "Saving Checkpoint");
#Save a checkpoint for the world state
$mc->saveCheckpoint();

#wait for 2 seconds 
sleep(2);
sendToChatAndConsole($mc, "Building Wall");
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

#wait for 4 seconds 
sleep(4);

sendToChatAndConsole($mc, "Restoring Checkpoint");
# Set the world back to the state it was in at the last saved checkpoint
$mc->restoreCheckpoint();

sendToChatAndConsole($mc, "Making World unbreakable");
$mc->setting('world_immutable', 1);
#wait for 8 seconds 
sleep(8);
sendToChatAndConsole($mc, "Making World breakable");
$mc->setting('world_immutable', 0);
#wait for 4 seconds 
sleep(4);
#Follow the player
sendToChatAndConsole($mc, "Set Camera to follow the player");
$mc->camera()->setFollow(1);
#wait for 4 seconds 
sleep(4);
sendToChatAndConsole($mc, "Making nametags visible");
$mc->setting('nametags_visible', 1);
#wait for 6 seconds 
sleep(6);
sendToChatAndConsole($mc, "Making nametags invisible");
$mc->setting('nametags_visible', 0);
#wait for 4 seconds 
sleep(4);
sendToChatAndConsole($mc, "Set Camera to normal player first person");
$mc->camera()->setNormal(1);

#wait for 2 seconds 
sleep(2);
sendToChatAndConsole($mc, "Turning off AutoJump");
$mc->player()->setting('autojump', 0);

#wait for 8 seconds 
sleep(8);
sendToChatAndConsole($mc, "Turning on AutoJump");
$mc->player()->setting('autojump', 1);




?>
