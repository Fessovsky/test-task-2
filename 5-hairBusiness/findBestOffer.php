<?php
require("main.php");
$width = getTerminalWidth();
$result = getBestOffer(prepareData(getFileData('input.txt')));
$fileName = 'output.txt';
saveToFile($fileName, $result);
echo str_repeat('-', $width) . "\n";
echo "Result: " . $result . "\nSuccessfully saved to '" . $fileName . "'\n";
echo str_repeat('-', $width) . "\n";
