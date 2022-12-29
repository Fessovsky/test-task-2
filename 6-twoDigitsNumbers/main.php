<?php

/**
 * Find width of a terminal window
 *
 * @return int
 */
function getTerminalWidth()
{
    $terminalSize = shell_exec('stty size');
    $dimensions = explode(' ', $terminalSize);
    return $dimensions[1];
}
/**
 * Сохраняет в файл строку
 *
 * @param string $fileName
 * @param string $data
 * @return void
 */
function saveToFile($fileName, $targetString)
{
    $input = fopen($fileName, "w") or die("Can't open the file.");
    fwrite($input, $targetString);
    fclose($input);
}
/**
 * Get content from the file
 *
 * @param string $fileName
 * @return string
 */
function getFileData($fileName)
{
    $file = fopen($fileName, 'r') or die("Can't open the file.");;
    if (!filesize($fileName)) {
        echo "\nfile is empty\n\n";
        return;
    }
    $content = fread($file, filesize($fileName));
    fclose($file);
    return $content;
}

/**
 * Ищем в обе стороны от числа. Какой быстрее срабатывает, такое и возвращаем.
 *
 * @param string $target
 * @return integer
 */
function findClosestTwoDigitNumber($stringOfNums)
{
    function checkTwoDigits($number)
    {
        $number = (string) $number;
        $numbersArray = array();
        for ($i = 0; $i < strlen($number); $i++) {
            if (!in_array($number[$i], $numbersArray)) {
                $numbersArray[] = $number[$i];
            }
        }
        return count($numbersArray) <= 2;
    }
    if (checkTwoDigits((int) $stringOfNums)) {
        return (int)$stringOfNums;
    }
    $integerUp = $integerDown = (int) $stringOfNums;
    do {
        $integerUp--;
        $integerDown++;
    } while (!checkTwoDigits($integerUp) && !checkTwoDigits($integerDown));
    if (checkTwoDigits($integerUp)) {
        return $integerUp;
    } else {
        return $integerDown;
    }
}
