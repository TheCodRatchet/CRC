<?php

namespace App;

class CharActions {
    public static function charFilter(array $chars, array $flags): array
    {

        //Checks for character flags and filters characters by types

        $filteredChars['letter'] = [];
        $filteredChars['punctuation'] = [];
        $filteredChars['symbol'] = [];

        foreach ($chars as $char) {
            if (ctype_alpha($char) && in_array('-L', $flags)) {
                $filteredChars['letter'][] = $char;
            }
            if (in_array($char, str_split("',;:.-?!{}[]()`")) && in_array('-P', $flags)) {
                $filteredChars['punctuation'][] = $char;
            }
            if (!in_array($char, str_split("',;:.-?!{}[]()`")) && !ctype_alpha($char) && in_array('-S', $flags)) {
                $filteredChars['symbol'][] = $char;
            }
        }
        return $filteredChars;
    }

    public static function charOutput(array $charCount, string $filter)
    {

        //Checks for chosen filter, finds characters for chosen filter and outputs sentence

        switch ($filter) {
            case 'most-repeating':
                foreach ($charCount as $type => $char) {
                    if (count($char) === 0 || max($char) === 1) {
                        echo "First most repeating $type: None" . PHP_EOL;
                    } else {
                        echo "First most repeating $type: " . array_search(max($char), $char) . PHP_EOL;
                    }
                }
                break;
            case 'least-repeating':
                foreach ($charCount as $type => $char) {

                    if (count($char) === 0 || min($char) === 1) {
                        echo "First least repeating $type: None" . PHP_EOL;
                    } else {
                        echo "First least repeating $type: " . array_search(min($char), $char) . PHP_EOL;
                    }
                }
                break;
            case 'non-repeating':
                foreach ($charCount as $type => $char) {
                    if (count($char) === 0 || min($char) !== 1) {
                        echo "First non-repeating $type: None" . PHP_EOL;
                    } else {
                        echo "First non-repeating $type: " . array_search(min($char), $char) . PHP_EOL;
                    }
                }
        }
    }
}