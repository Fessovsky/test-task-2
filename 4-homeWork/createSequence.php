<?php
require("main.php");

$width = getTerminalWidth();
echo str_repeat('-', $width) . "\n";

$dataArray = generateData();
$string = count($dataArray);
$string .= "\n" . implode(" ", $dataArray);
$fileName = 'input.txt';

saveToFile($fileName, $string);
