#!/usr/bin/env php

<?php
error_reporting(E_ALL);

require_once 'mcpi/minecraft.php';


// Check that have the appropriate number of command line arguments (one in this case)
//$argv is a list of the command line arguments given and the script name
//$argc -1 is the number of argument
$numOfArguments = $argc-1;

if ($numOfArguments == 1){

    // Create a connection to Minecraft
    // Any communication with the world must require_once this object
    $mc = Minecraft::create();
    // create the output message as a string
    $filename = $argv[1];
    
    //get a filehandle to file and read each line in turn
    //if know is a small file can get whole contents without filehandles using:
    //$fileContents = file_get_contents($filename);
    //This creates a string with whole file that could be split on newline characters into lines
    $fh = fopen($filename, 'r') or exit("File does not exist or you do not have permission to open");
    while($line = fgets($fh)){
        // print to the php interpreter standard output (terminal probably)
        echo($line."\n");
        // send message to the minecraft chat
        $mc->postToChat($line);
    }
    //Close previously opened file handle
    fclose($fh);
} else{
    print("Expected only one string as argument for script, but received $numOfArguments\n");
    exit();
}


?>
