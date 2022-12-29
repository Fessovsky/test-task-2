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
 * Take string return array of number sequense
 *
 * @param string $data
 * @return array
 */
function prepareData($data)
{
    return explode(" ", substr($data, strpos($data, "\n") + 1));
}

/**
 * Получаем сумму выгодных сделок
 *
 * @param array $case
 * @param integer $money
 * @param integer $hairLength
 * @return integer
 */
function getBestOffer($case, $money = 0, $hairLength = 1)
{
    $maxPrice = max($case);
    $day = array_keys($case, $maxPrice)[0] + 1;
    $money = $hairLength * $day * $maxPrice + $money;
    $case = array_slice($case, $day);
    if (count($case) > 0) {
        return getBestOffer($case, $money, $hairLength, $day);
    } else {
        return $money;
    }
}
/**
 * Создаем последовательность для тестов
 *
 * @return array
 */
function generateSequence()
{
    $length = rand(5, 20);
    $array = array();
    for ($i = 0; $i < $length; $i++) {
        $number = rand(1, 100);
        array_push($array, $number);
    }
    return $array;
}
