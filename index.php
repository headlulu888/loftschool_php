<?php
error_reporting(E_ALL);

require_once "./src/function.php";

$str_arr = [
    'blabla1',
    'blabla2',
    'blabla3'
];

echo 'Задание 1' . "<br>";
task1($str_arr);
echo "<hr>";
echo 'Задание 2' . "<br>";
echo task2('/', 1,2,3);
echo "<hr>";
echo 'Задание 3' . "<br>";
task3(1,5);
echo "<hr>";
echo 'Задание 4' . "<br>";
task4();
echo "<hr>";
echo 'Задание 5' . "<br>";
task5();
echo "<hr>";
echo 'Задание 6' . "<br>";
task6(text);