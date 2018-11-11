<?php
/**
 * Created by PhpStorm.
 * User: Andrey-PC
 * Date: 12.11.2018
 * Time: 0:24
 */

// Задание 1
$name = "Andrey";
$age = "26";
echo "Меня зовут:" . $name . "<br>";
echo "Мне " . $age . " лет" . "<br>";
echo "\"!|\\/'\"\\";

// Задание 2
const MARKER = 23;
const PENCIL = 40;
const ALLPIC = 80;

$done = ALLPIC - (MARKER + PENCIL);
echo "Всего рисунков на выставке: " . ALLPIC . "<br>";
echo "Выполнены фломастерами: " . MARKER . "<br>";
echo "Выполнены карандашами: " . PENCIL . "<br>";
echo "Сколько рисунков выполнено красками ?" . "<br>";
echo "Выполнено красками: " . $done;

// Задание 3
$age = rand(1, 100);

if($age >= 18 && $age <= 65 ) {
    echo "Вам еще работать и работать";
} elseif($age > 65) {
    echo "Вам пора на пенсию";
} elseif($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}

// Задание 4
$day = date("8");

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;

    default:
        echo "Неизвестный день";
        break;
}

// Задача 5
$bmw = [
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => "2015"
];

$toyota = [
    "model" => "RAV4",
    "speed" => 200,
    "doors" => 5,
    "year" => "2017"
];

$opel = [
    "model" => "ASTRA",
    "speed" => 300,
    "doors" => 3,
    "year" => "2010"
];

$arr = [$bmw, $toyota, $opel];
echo "Car bmw" . "<br>" . $arr[0]['model'] . " " . $arr[0]['speed'] . " " . $arr[0]['doors'] . " " . $arr[0]['year'] . "<br>";
echo "Car toyota" . "<br>" . $arr[1]['model'] . " " . $arr[1]['speed'] . " " . $arr[1]['doors'] . " " . $arr[1]['year'] . "<br>";
echo "Car opel" . "<br>" . $arr[2]['model'] . " " . $arr[2]['speed'] . " " . $arr[2]['doors'] . " " . $arr[2]['year'] . "<br>";

// Задача 6
echo "<table border='1'>";
for($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for($j = 1; $j <= 10; $j++) {
        echo "<td>";
        if($i % 2 == 0 && $j % 2 == 0) {
            echo $j . "*" . $i . "=" . "(" . ($i*$j) . ")";
        } elseif($i % 2 !== 0 && $j % 2 !== 0) {
            echo $j . "*" . $i . "=" . "[" . ($i*$j) . "]";
        } else {
            echo $j . "*" . $i . "=" . ($i*$j);
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";