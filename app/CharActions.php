<?php

namespace App;

class CharActions
{
    public static function charFilter(array $chars, array $flags): array
    {
        //Checks for character flags and filters characters by types

        $filteredChars['letter'] = [];
        $filteredChars['punctuation'] = [];
        $filteredChars['symbol'] = [];

        foreach ($chars as $char) {
            if (ctype_alpha($char) && in_array('-L', $flags)) {  //Filters all letters into letter array
                $filteredChars['letter'][] = $char;
            }
            if (in_array($char, str_split("',;:.-?!{}[]()`")) && in_array('-P', $flags)) {  //Filters all punctuations into punctuation array
                $filteredChars['punctuation'][] = $char;
            }
            if (!in_array($char, str_split("',;:.-?!{}[]()`")) && !ctype_alpha($char) && in_array('-S', $flags)) {  //Filters all symbols into symbol array
                $filteredChars['symbol'][] = $char;
            }
        }
        return $filteredChars;  //Returns filtered array of characters
    }

    public static function charOutput(array $charCount, string $filter)
    {
        //Checks for chosen filter, finds characters for chosen filter and outputs sentence

        switch ($filter) {
            case 'most-repeating':
                FilterCases::mostRepeatingCheck($charCount); //Returns most repeating characters
                break;
            case 'least-repeating':
                FilterCases::leastRepeatingCheck($charCount); //Returns lest repeating characters
                break;
            case 'non-repeating':
                FilterCases::nonRepeatingCheck($charCount); //Returns non repeating characters
        }
    }
}