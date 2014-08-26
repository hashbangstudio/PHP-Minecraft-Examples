#!/usr/bin/env php

<?php
error_reporting(E_ALL);

# We have to import the minecraft api module to do anything in the minecraft world
require_once 'mcpi/minecraft.php';


function printAvailableCameraModes(){
    print("Available camera modes are:\n");
    print("normal, follow, fixed\n");
}

function printUsage(){
    print("Usage : php script.php normal [entityId]\n");
    print("Usage : php script.php follow [entityId]\n");
    print("Usage : php script.php fixed Xcoord Ycoord Zcoord\n");
}

# Create a connection to Minecraft
# Any communication with the world must require_once this object
$mc = Minecraft::create();

$minNumOfParams = 1;
$numOfParamsGiven = $argc-1;

if ($numOfParamsGiven >= $minNumOfParams){
    $cameraMode = $argv[1];
    #print $cameraMode."\n";
    
    #NOTE switch does == comparison (loose)
    switch ($cameraMode) {
        case  "follow":
            if ($numOfParamsGiven === 1){
                $mc->camera()->setFollow();
            }else if($numOfParamsGiven === 2){
                $mc->camera()->setFollow($argv[2]);
            }else{
                print("Expected 1 or 2 parameters but got $numOfParamsGiven\n");
                printUsage();
                exit();
            }
            break;
        case "normal":
            if ($numOfParamsGiven === 1){
                $mc->camera()->setNormal();
            }else if($numOfParamsGiven === 2){
                $mc->camera()->setNormal($argv[2]);
            }else{
                print("Expected 1 or 2 parameters but got $numOfParamsGiven\n");
                printUsage();
                exit();
            }
            break;
        case "fixed":
            if ($numOfParamsGiven == 4) {
                #should verify arguments are integer coordinates
                $mc->camera()->setFixed();
                $mc->camera()->setPos($argv[2], 
                                      $argv[3], 
                                      $argv[4]);
            }else{
                print("insufficient parameters given. \n");
                print("Require 4 but got $numOfParamsGiven\n");
                printUsage();
                exit();
            }
            break;
        default:
            print("Unknown camera mode parameter given ".$argv[1]."\n");
            printAvailableCameraModes();
            printUsage();
            exit();
    }
}else{
    print("insufficient parameters given\n");
    print("Require minimum of $minNumOfParams, got $numOfParamsGiven\n");
    printUsage();
    exit();
}

?>
