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
 * Генерирует произвольную последовательность из чисел 0 и 1
 *
 * @param int $length
 * @return string
 */
function createSequense($length)
{
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= (string) random_int(0, 1);
    }
    return $string;
}
/**
 * Get content from file by filename
 *
 * @param string $fileName
 * @return string file content
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
 * find longest sequence of 0s
 *
 * @param string $content
 * @return string
 */
function findLongestSequence($content)
{

    $currentSequence = 0;
    $longetsSequence = 0;

    for ($i = 0; $i < strlen($content); $i++) {
        if ($content[$i] === "0") {
            $currentSequence++;
        } else {
            if ($currentSequence > $longetsSequence) {
                $longetsSequence = $currentSequence;
            }
            $currentSequence = 0;
        }
    }
    if ($currentSequence > $longetsSequence) {
        $longetsSequence = $currentSequence;
    }
    return $longetsSequence;
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
