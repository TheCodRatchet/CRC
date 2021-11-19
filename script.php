<?php

require_once 'vendor/autoload.php';

use App\CharActions;
use App\Models\Input;

$config = json_decode(file_get_contents('config.json')); //Reads config file
$input = new Input($argv, $config); //Using array of command line conditions and config file constructs new input object

$inputFile = $input->inputFile(); //Returns input File
$filter = $input->filter(); //Returns filers
$charFlags = $input->charFlags(); //Returns character flags

$chars = str_split(file($input->inputFile())[0]); //Reads input file and splits content in to single character

$filteredChars = charActions::charFilter($chars, $charFlags);
$charCount = [];

foreach ($filteredChars as $type => $characters) {  //Checks for character occurrences
    $charCount[$type] = array_count_values($characters);
}

echo "File: $inputFile" . PHP_EOL; //Output = File: 'fileName.txt'
charActions::charOutput($charCount, $filter); //Output = First 'Filter flag value' 'letter/symbol/punctuation: 'result of conditions'