<?php
require("main.php");

$width = getTerminalWidth();

$nums = prepareNumbers(getFileData('input.txt'));

$data = getSumOfPositiveNums($nums) . ' ' . getMinMaxNumsProduct($nums);
$fileName = 'output.txt';
saveToFile($fileName, $data);

echo str_repeat('-', $width) . "\n";
echo "Result: " . $data . "\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);
