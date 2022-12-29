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
 * Генерирует произвольную последовательность из [<,>,-]
 *
 * @param int $length
 * @return string
 */
function createSequense($length)
{
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        switch (random_int(0, 2)) {
            case '0':
                $string .= "<";
                break;
            case '1':
                $string .=  ">";
                break;

            default:
                $string .=  "-";
                break;
        }
    }
    return $string;
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

/**
 * Используюя патерн в регулярном выражении считаем упоминания стрелок
 * но только те стрелки, которые не являются частью других стрелок
 *
 * @param string $content
 * @return integer Количество стрелок
 */
function findArrows($content)
{
    $count = preg_match_all('/>>-->|<--<</', $content, $matches);
    return $count;
}


/**
 * Решает проблему перекрывающихся стрел, когда однасостоит из другой.
 *
 * @param [type] $content
 * @return void
 */
function improvedFindArrow($content)
{

    function recursion($string, $arrowCount = 0)
    {
        $positionLeft = strpos($string, '<--<<');
        $positionRight = strpos($string, '>>-->');
        if (strlen($string) < 4 || (!$positionLeft && !$positionRight)) {
            return $arrowCount;
        }
        if ($positionLeft !== FALSE && ($positionLeft < $positionRight || $positionRight === FALSE)) {
            $string = substr($string, $positionLeft + 4);
            return recursion($string, $arrowCount + 1,);
        }
        if ($positionRight !== FALSE && ($positionRight < $positionLeft || $positionLeft === FALSE)) {
            $string = substr($string, $positionRight + 4);
            return recursion($string, $arrowCount + 1,);
        }
    }
    return recursion($content);
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
