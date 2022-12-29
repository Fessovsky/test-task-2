<?php

/**
 * Сохраняет в файл строку
 *
 * @param string $fileName
 * @param string $targetString
 * @return void
 */
function saveToFile($fileName, $targetString)
{
    $input = fopen($fileName, "w") or die("Can't open the file.");
    fwrite($input, $targetString);
    fclose($input);
}

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
 * Создаем рандомную строку из латинских символов
 *
 * @return string
 */
function createRandomStringSequence()
{
    $chars = 'abcdefghijklmnopqrstuvwxyz';
    $length = random_int(1, 10);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $chars[random_int(0, strlen($chars) - 1)];
    }
    $randomString = str_repeat($randomString, 50000 / $length + 1);
    $randomString = substr($randomString, 0, 50000);

    return $randomString;
}

/**
 * Ищем циклическую строку методом перебора последующей последовательности
 *
 * @param string $fileName
 * @return string
 */
function getMinimalSubstringFirstIdea($fileName)
{
    $file = fopen($fileName, 'r');
    if (!filesize($fileName)) {
        echo "\nfile is empty\n\n";
        return;
    }
    $fullString = fread($file, filesize($fileName));
    fclose($file);

    $fullStringLength = strlen($fullString);

    for ($i = 1; $i <= $fullStringLength; $i++) {
        $baseString = substr($fullString, 0, $i);
        $rollingWaveString = substr($fullString, $i, $i);
        if ($baseString === $rollingWaveString) {
            if (
                substr(
                    str_repeat(
                        $rollingWaveString,
                        $fullStringLength
                    ),
                    0,
                    $fullStringLength
                ) === $fullString
            ) {
                return $rollingWaveString;
            }
        }
    }
}

/**
 * Ищем строку сравнивая достроенную итоговую последовательность 
 * с исходной строкой, работает с граничными 
 * случаями (1 буква, повтор нескольких подпоследовательностей)
 *
 * @param string $fileName
 * @return string
 */
function getMinimalSubstringSecondIdea($fileName)
{
    $file = fopen($fileName, 'r');
    if (!filesize($fileName)) {
        echo "\nfile is empty\n\n";
        return;
    }
    $fullString = fread($file, filesize($fileName));
    fclose($file);

    $fullStringLength = strlen($fullString);
    for ($i = 1; $i <= $fullStringLength; $i++) {
        $baseString = substr($fullString, 0, $i);
        $cycled = substr(str_repeat($baseString, $fullStringLength), 0, $fullStringLength);
        if ($cycled === $fullString) {
            return $baseString;
        }
    }
}
