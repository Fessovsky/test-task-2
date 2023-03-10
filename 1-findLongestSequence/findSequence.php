<?php
require("main.php");

$width = getTerminalWidth();
$content = getFileData('input.txt');
$longestSequenceLength = findLongestSequence($content);

$fileName = 'output.txt';
saveToFile($fileName, $longestSequenceLength);

echo str_repeat('-', $width) . "\n";
echo "Longest sequence length: " . $longestSequenceLength . "\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);
