<?php
require("main.php");

$width = getTerminalWidth();
$result = findClosestTwoDigitNumber(getFileData('input.txt'));
$fileName = 'output.txt';
echo str_repeat('-', $width) . "\n";
echo "Result: " . $result . "\nSuccessfully saved to '" . $fileName . "'\n";
echo str_repeat('-', $width) . "\n";
