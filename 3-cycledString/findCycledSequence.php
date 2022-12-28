<?php 
require("main.php");

$width = getTerminalWidth();

$cycledString = getMinimalSubstringFirstIdea('input.txt');

$fileName = 'output.txt';
saveToFile($fileName, strlen($cycledString));

echo str_repeat('-', $width)."\n";
echo "Shortest sequence length: ". $cycledString. "\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);