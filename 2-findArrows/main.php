<?php 
/**
 * Сохраняет в файл строку
 *
 * @param string $fileName
 * @param string $data
 * @return void
 */
function saveToFile($fileName, $data){
    $input = fopen($fileName, "w") or die("Can't open the file.");
    fwrite($input, $data);
    fclose($input);
}

/**
 * Генерирует произвольную последовательность из [<,>,-]
 *
 * @param int $length
 * @return string
 */
function createSequense($length){
    $string = '';

    for($i = 0; $i < $length; $i++){
        switch (random_int(0,2)) {
            case '0':
                $string.= "<";
                break;
            case '1':
                $string.=  ">";
                break;
            
            default:
                $string.=  "-";
                break;
        }
    }
    return $string;
}


/**
 * Используюя патерн в регулярном выражении считаем упоминания стрелок
 *
 * @param string $fileName
 * @return integer Количество стрелок
 */
function findArrows($fileName){
    $file = fopen($fileName,'r');
    if(!filesize($fileName)){
        echo "\nfile is empty\n\n";
        return;
    }
    $content = fread($file, filesize($fileName));
    fclose($file);
    $count = preg_match_all('/<--<<|>>-->/',$content);
    return $count;
}

/**
 * Find width of a terminal window
 *
 * @return int
 */
function getTerminalWidth(){
    $terminalSize = shell_exec('stty size');
    $dimensions = explode(' ', $terminalSize);
    return $dimensions[1];
}
?>