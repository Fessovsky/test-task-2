<?php
require("main.php");

$width = getTerminalWidth();
echo str_repeat('-', $width)."\n";
$length = null;
while(!is_numeric($length) || $length>100 || $length < 1){
    $length = readline("Please, enter length (integer) of a sequence between 1 and 100: ");
}

$data = createSequense((integer) $length);

$fileName = 'input.txt';

saveToFile($fileName, $data);

echo "\nSequence:\n'". $data. "'\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);