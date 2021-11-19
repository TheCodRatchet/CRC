<?php

namespace App;

class FilterCases
{
    public static function mostRepeatingCheck($charCount)
    {
        //Checks for most repeating character

        foreach ($charCount as $type => $char) {

            if (count($char) === 0 || max($char) === 1) {
                echo "First most repeating $type: None" . PHP_EOL;
            } else {
                echo "First most repeating $type: " . array_search(max($char), $char) . PHP_EOL;
            }
        }
    }

    public static function leastRepeatingCheck($charCount)
    {
        //Checks for least repeating character

        foreach ($charCount as $type => $char) {

            if (count($char) === 0 || min($char) === 1) {
                echo "First least repeating $type: None" . PHP_EOL;
            } else {
                echo "First least repeating $type: " . array_search(min($char), $char) . PHP_EOL;
            }
        }
    }

    public static function nonRepeatingCheck($charCount)
    {
        //Checks for non repeating character

        foreach ($charCount as $type => $char) {
            if (count($char) === 0 || min($char) !== 1) {
                echo "First non-repeating $type: None" . PHP_EOL;
            } else {
                echo "First non-repeating $type: " . array_search(min($char), $char) . PHP_EOL;
            }
        }
    }
}