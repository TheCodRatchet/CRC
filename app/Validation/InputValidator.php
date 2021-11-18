<?php

namespace App\Validation;

class InputValidator
{
    public function inputFlagValidation(string $inputFlag, array $flags): bool
    {
        //Checks if input Flags are correct

        foreach ($flags as $flag) {
            if ($inputFlag === $flag) {
                return true;
            }
        }
        return false;
    }

    public function inputFileContentsValidation(string $inputFile, array $forbiddenChars): bool
    {
        //Checks if:
        //File is empty
        //Characters are lower case alphabet ASCII letters, punctuations and symbols only
        //File contains spaces, new-lines and numbers

        if (empty(file($inputFile))) {
            return false;
        }

        $chars = str_split(file($inputFile)[0]);

        foreach ($forbiddenChars as $char) {
            if (in_array($char, $chars)) {
                return false;
            }
        }

        foreach ($chars as $char) {
            if (ctype_alpha($char) && $char !== strtolower($char) || is_numeric($char)) {
                return false;
            }
        }
        return true;
    }

    public function filterFlagValidation(string $filterFlag, array $flags): bool
    {
        //Checks if filter Flags are correct

        foreach ($flags as $flag) {
            if ($filterFlag === $flag) {
                return true;
            }
        }
        return false;
    }

    public function filterValidation(string $filter, array $defaultFilters): bool
    {
        //Checks if filters are correct

        foreach ($defaultFilters as $defaultFilter) {
            if ($filter === $defaultFilter) {
                return true;
            }

        }
        return false;
    }

    public function charsFlagValidation(string $value, array $flags): bool
    {
        //Checks if character Flags are correct

        foreach ($flags as $flag) {
            if ($value === $flag) {
                return true;
            }
        }
        return false;
    }
}