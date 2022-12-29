<?php
require("main.php");

$width = getTerminalWidth();
echo str_repeat('-', $width) . "\n";

$length = null;
while (!is_numeric($length) || $length > 250 || $length < 1) {
    $length = readline("Please, enter length(integer) of a sequence up to 250: ");
}

$data = createSequense((int) $length);

$fileName = 'input.txt';

saveToFile($fileName, $data);
