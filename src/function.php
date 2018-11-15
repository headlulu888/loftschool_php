<?php

//Задание 1
function task1($arr, $bool = false) {
    if($bool == false) {
        foreach ($arr as $ar) {
            echo "<p>$ar</p>";
        }
    } elseif($bool == true) {
        $str = "";
        foreach ($arr as $ar) {
            $str .= $ar;
        }

        echo $str;
    }
}

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
    if(is_int($num1) && is_int($num2)) {
        echo "<table border='1'>";
        for($i = $num1; $i <= $num2; $i++) {
            echo "<tr>";
            for($j = $num1; $j <= $num2; $j++) {
                echo "<td>";
                echo $j . "x" . $i . "=" . ($i * $j);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        throw new Exception();
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
function task6($file_name) {
    $file_name = $file_name . ".txt";
    $fn = fopen($file_name, 'w');
    fwrite($fn, 'Hello again!');
    readfile($file_name);
    fclose($fn);
}
