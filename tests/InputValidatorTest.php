<?php

use App\Validation\InputValidator;
use PHPUnit\Framework\TestCase;

class InputValidatorTest extends TestCase
{
    public function testInputFlagValidation()
    {
        $validator = new InputValidator();
        $config = json_decode(file_get_contents( '../config.json'));

        $result = $validator->inputFlagValidation('-i', $config->inputFlags);
        $this->assertEquals(true, $result);
        $result = $validator->inputFlagValidation('--input', $config->inputFlags);
        $this->assertEquals(true, $result);
        $result = $validator->inputFlagValidation('Anything else', $config->inputFlags);
        $this->assertEquals(false, $result);
    }

    public function testInputFileValidation()
    {
        $config = json_decode(file_get_contents( '../config.json'));

        $result = "file.txt" === $config->inputFile;
        $this->assertEquals(true, $result);
        $result = "anythingElse.txt" === $config->inputFile;;
        $this->assertEquals(false, $result);
    }

    public function testInputFileContentsValidation()
    {
        $validator = new InputValidator();
        $config = json_decode(file_get_contents( '../config.json'));

        $result = $validator->inputFileContentsValidation('fine.txt', $config->forbiddenChars);
        $this->assertEquals(true, $result);
        $result = $validator->inputFileContentsValidation('numbers.txt', $config->forbiddenChars);
        $this->assertEquals(false, $result);
        $result = $validator->inputFileContentsValidation('space.txt', $config->forbiddenChars);
        $this->assertEquals(false, $result);
        $result = $validator->inputFileContentsValidation('newLines.txt', $config->forbiddenChars);
        $this->assertEquals(false, $result);
        $result = $validator->inputFileContentsValidation('uppercase.txt', $config->forbiddenChars);
        $this->assertEquals(false, $result);
    }

    public function testFilterFlagValidation()
    {
        $validator = new InputValidator();
        $config = json_decode(file_get_contents( '../config.json'));

        $result = $validator->filterFlagValidation('-f', $config->filterFlags);
        $this->assertEquals(true, $result);
        $result = $validator->filterFlagValidation('--format', $config->filterFlags);
        $this->assertEquals(true, $result);
        $result = $validator->filterFlagValidation('Anything else', $config->filterFlags);
        $this->assertEquals(false, $result);
    }

    public function testFilterValidation()
    {
        $validator = new InputValidator();
        $config = json_decode(file_get_contents( '../config.json'));

        $result = $validator->filterValidation('most-repeating', $config->filters);
        $this->assertEquals(true, $result);
        $result = $validator->filterValidation('least-repeating', $config->filters);
        $this->assertEquals(true, $result);
        $result = $validator->filterValidation('non-repeating', $config->filters);
        $this->assertEquals(true, $result);
        $result = $validator->filterValidation('Anything else', $config->filters);
        $this->assertEquals(false, $result);
    }

    public function testCharsFlagValidation()
    {
        $validator = new InputValidator();
        $config = json_decode(file_get_contents( '../config.json'));

        $result = $validator->charsFlagValidation('-P', $config->charFlags);
        $this->assertEquals(true, $result);
        $result = $validator->charsFlagValidation('-L', $config->charFlags);
        $this->assertEquals(true, $result);
        $result = $validator->charsFlagValidation('-S', $config->charFlags);
        $this->assertEquals(true, $result);
        $result = $validator->charsFlagValidation('Anything else', $config->charFlags);
        $this->assertEquals(false, $result);
    }
}