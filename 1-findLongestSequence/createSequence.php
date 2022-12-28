<?php
require("main.php");

$width = getTerminalWidth();
echo str_repeat('-', $width)."\n";
$length = readline("Please, enter length of a sequence: ");

$data = createSequense((integer) $length);

$fileName = 'input.txt';

saveToFile($fileName, $data);

echo "\nSequence:\n'". $data. "'\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);