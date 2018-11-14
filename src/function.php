<?php

//Задание 1
function task1($str_arr, $bool = false) {
    if ($bool) {
        $concat = implode(' ', $str_arr);
        return $concat;
    } else {
        foreach ($str_arr as $str) {
            echo '<p>' . $str . '</p>';
        }
    }
};

//Задание 2
function task2($operation, ...$numbers) {
    switch ($operation) {
        case '+':
            $sum = 0;
            foreach ($numbers as $number) {
                $sum += $number;
            }
            return $sum;
            break;
        case '-':
            $ex = $numbers[0];
            for ($i = 1; $i < count($numbers); $i++) {
                $ex -= $numbers[$i];
            }
            return $ex;
            break;
        case '*':
            $mult = 1;
            foreach ($numbers as $number) {
                $mult *= $number;
            }
            return $mult;
            break;
        case '/':
            $hasZero = 1;
            for ($i = 1; $i < count($numbers); $i++) {
                $hasZero *= $numbers[$i];
            }
            if ($hasZero) {
                $div = $numbers[0];
                for ($i = 1; $i < count($numbers); $i++) {
                    $div /= $numbers[$i];
                }
                return $div;
            } else {
                echo 'Вы хотите поделить на ноль, побойтесь Бога';
            }
            break;
        default:
            echo 'Недопустимая операция. Выберите +,-,*,/';
    }
}

//Задание 3
function task3($num1, $num2) {
    if ($num1 ==0 || $num2 ==0) {
        echo 'Аргументы не должны равняться 0';
    } else {
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo  '<td style = "font-weight: bold;">N</td>';
        for ($j = 1; $j <= $num2; $j++) {
            echo '<td style = "font-weight: bold;">' . $j . '</td>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        for ($i = 1; $i <= $num1; $i++) {
            echo '<tr><td style = "font-weight: bold;">'. $i . '</td>';
            for ($j = 1; $j <= $num2; $j++) {
                echo '<td>' . $i * $j . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

//Задание 4
function task4() {
    echo 'Текущее время: ' . date('d.m.y H:i') . '<br>';
    echo 'Unixtime время для 24.02.2016 00:00:00 --' . strtotime('24.02.2016 00:00:00');
}

//Задание 5
function task5() {
    $str1 = 'Карл у Клары украл Кораллы';
    echo 'Было: ' . $str1 . '<br>';
    echo 'Стало: ' . str_replace('К', '', $str1) . '<br>'. '<br>';
    $str2 = 'Две бутылки лимонада';
    echo 'Было: ' . $str2 . '<br>';
    echo 'Стало: ' . mb_ereg_replace('Две', 'Три', $str2);
}

//Задание 6
function task6($filename) {
    $file = fopen($filename, 'w');
    fwrite($file, 'Hello again!');
    readfile($filename);
    fclose($file);
}
