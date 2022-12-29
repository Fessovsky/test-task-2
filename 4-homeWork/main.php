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
 * Генерируем данные для теста 
 *
 * @return array
 */
function generateData()
{
    function addUniqNumber($array, $length)
    {
        $number = rand(-102, 102);
        if (!in_array($number, $array)) {
            array_push($array, $number);
            return $array;
        } else {
            return addUniqNumber($array, $length);
        }
    }

    $length = rand(5, 10);
    $arr = array();
    echo $length . " this is length \n";
    for ($i = 0; $i < $length; $i++) {
        $arr = addUniqNumber($arr, $length);
    }
    return $arr;
}


function prepareNumbers($data)
{
    return explode(" ", substr($data, strpos($data, "\n") + 1));
}

function getSumOfPositiveNums($nums)
{
    $sumPositives = 0;
    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] > 0) {
            $sumPositives += $nums[$i];
        }
    }
    return $sumPositives;
}

function getMinMaxNumsProduct($nums)
{
    $min = min($nums);
    $max = max($nums);
    $minIndex = array_search($min, $nums);
    $maxIndex = array_search($max, $nums);
    $result = 1;
    for ($i = min($minIndex, $maxIndex) + 1; $i < max($minIndex, $maxIndex); $i++) {
        $result *= $nums[$i];
    }

    return $result;
}
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
// $nums = prepareNumbers($data);
// print_r(getSumOfPositiveNums($nums));
// echo "\n";
// print_r(getMinMaxNumsProduct($nums));
// echo "\n";
