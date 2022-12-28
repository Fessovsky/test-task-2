<?php
require("main.php");

$width = getTerminalWidth();


$arrowCounter = findArrows("input.txt");
$fileName = 'output.txt';
saveToFile($fileName, $arrowCounter);

echo str_repeat('-', $width)."\n";
echo "Arrows in sequence: ". $arrowCounter. "\nSuccessfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);