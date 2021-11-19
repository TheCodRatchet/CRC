Welcome to 'Character Repeat Checker' app.

To use this app follow steps mentioned below:

1. Clone this project on your Computer
2. Create new .txt file inside this project (this file will be used to run application);
3. Open project and go to config.json file. Change inputFile to file that has been created in previous step;
4. In terminal type following command: php script.php -i inputFileName -f filterName flags;

This application has the following filters:

1. most-repeating
2. least-repeating
3. non-repeating

This application has the following flags:

1. -L (letters)
2. -P (punctuation)
3. -S (symbols)

Example of command line in terminal:

php script.php -i file.txt -f most-repeating -L -P -S
