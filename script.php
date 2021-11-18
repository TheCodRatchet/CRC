<?php

require_once 'vendor/autoload.php';

use App\CharActions;
use App\Models\Input;

$config = json_decode(file_get_contents('config.json'));
$input = new Input($argv, $config);

$inputFile = $input->inputFile();
$filter = $input->filter();
$charFlags = $input->charFlags();

$chars = str_split(file($input->inputFile())[0]);

$filteredChars = charActions::charFilter($chars, $charFlags);
$charCount = [];
foreach ($filteredChars as $type => $characters) {
    $charCount[$type] = array_count_values($characters);
}

echo "File: $inputFile" . PHP_EOL; //Output = File: 'fileName.txt'
charActions::charOutput($charCount, $filter); //Output = First 'Filter flag value' 'letter/symbol/punctuation: 'result of conditions'