<?php
require("main.php");

$width = getTerminalWidth();

echo str_repeat('-', $width) . "\n";

$string = (string) rand(1, 30000);
$fileName = 'input.txt';
saveToFile($fileName, $string);

echo "Done\n";
echo str_repeat('-', $width);
