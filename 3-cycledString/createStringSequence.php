<?php
require("main.php");

$width = getTerminalWidth();
echo str_repeat('-', $width) . "\n";

$data = createRandomStringSequence();
$fileName = 'input.txt';
saveToFile($fileName, $data);
echo "Done\n";
echo str_repeat('-', $width);
