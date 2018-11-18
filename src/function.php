<?php

//Задание 1
function task1($strings, $clue = false) {
    if($clue == false) {
        foreach ($strings as $string) {
            echo "<p>$string</p>";
        }
    } elseif($clue == true) {
        $result = "";
        foreach ($strings as $string) {
            $result .= $string;
        }

        echo $result;
    }
}

//Задание 2
function task2($operation, ...$numbers) {
    if($operation == '/' && in_array(0, $numbers)) {
        echo 'Делить на 0 нельзя';
        return null;
    }

    $all_variable_are_numbers = true;
    foreach ($numbers as $num) {
        if(!is_numeric($num)) {
            echo 'Введите число';
            $all_variable_are_numbers = true;
            break;
        }
    }

    if(!$all_variable_are_numbers) {
        echo 'Неверный тип аргументов. Приведите к Int или Float';
    }

    $expression = implode($operation, $numbers);
    echo $expression . ' = ' . eval('return ' . $expression . ';');

}

//Задание 3
function task3($first_number, $second_number) {
    if(is_int($first_number) && is_int($second_number)) {
        echo "<table border='1'>";
        for($row = $first_number; $row <= $second_number; $row++) {
            echo "<tr>";
            for($col = $first_number; $col <= $second_number; $col++) {
                echo "<td>";
                echo $col . ' x ' . $row . ' = ' . ($row * $col);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo 'Введите только целые числа';
    }
}

//Задание 4
function task4() {
    echo 'Текущее время: ' . date('d.m.y H:i:s') . '<br>';
    echo 'Unixtime время для 24.02.2016 00:00:00 --' . strtotime('24.02.2016 00:00:00');
}

//Задание 5
function task5() {
    $str1 = 'Карл у Клары украл Кораллы';
    echo 'Было: ' . $str1 . '<br>';
    echo 'Стало: ' . str_replace('К', '', $str1) . '<br>'. '<br>';
    $str2 = 'Две бутылки лимонада';
    echo 'Было: ' . $str2 . '<br>';
    echo 'Стало: ' . str_replace('Две', 'Три', $str2);
}

//Задание 6
function task6($file_name) {
    $file_name = $file_name . ".txt";
    $file_text = 'Hello again!';
    file_put_contents($file_name, $file_text);
    echo file_get_contents($file_name);

}
