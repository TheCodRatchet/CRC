<?php

namespace App\Models;

use App\Validation\InputValidator;

class Input
{
    private string $inputFlag; //Input flag (-i/--input)
    private string $inputFile; //Input file with contents
    private string $filterFlag; //Filter flag (-f/--format)
    private string $filter; // filter (non-repeating/least-repeating/most-repeating)
    private array $charFlags; //Character flags (-L/-P/-S)
    private InputValidator $validator;

    public function __construct(array $input, $config)
    {
        $this->validator = new InputValidator();

        if (count($input) < 6 || count($input) > 8) { //Checks if command line has more or less conditions than required
            exit('error code 4');
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 0:
                    break;
                case 1:
                    $this->validator->inputFlagValidation($value, $config->inputFlags) ? $this->inputFlag = $value : exit('error code 1');
                    break;
                case 2:
                    $value === $config->inputFile ? $this->inputFile = $value : exit('error code 1');
                    $this->validator->inputFileContentsValidation($value, $config->forbiddenChars) ? $this->inputFile = $value : exit('error code 2');
                    break;
                case 3:
                    $this->validator->filterFlagValidation($value, $config->filterFlags) ? $this->filterFlag = $value : exit('error code 3');
                    break;
                case 4:
                    $this->validator->filterValidation($value, $config->filters) ? $this->filter = $value : exit('error code 3');
                    break;
                case ($key > 4):
                    $this->validator->charsFlagValidation($value, $config->charFlags) ? $this->charFlags[] = $value : exit('error code 4');
                    break;
            }
        }
    }

    public function inputFile(): string
    {
        return $this->inputFile;
    }

    public function filter(): string
    {
        return $this->filter;
    }

    public function charFlags(): array
    {
        return $this->charFlags;
    }
}