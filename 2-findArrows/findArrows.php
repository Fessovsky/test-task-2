<?php
require("main.php");

$width = getTerminalWidth();

$content = getFileData('./input.txt');

$arrowCounter = findArrows($content);
$arrowCounter2 = improvedFindArrow($content);
echo "This: " . $arrowCounter2;

$fileName = './output.txt';
saveToFile($fileName, $arrowCounter2);

echo str_repeat('-', $width) . "\n";
echo "Arrows in sequence with preg_match_all: " . $arrowCounter . "\nArrows with improved function: " . $arrowCounter2 . "\nOutput of a second func successfully saved to '" . $fileName . "'\n";

echo str_repeat('-', $width);
