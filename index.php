<?php
error_reporting(E_ALL);

require_once "./src/function.php";

$str_arr = [
    'blabla1',
    'blabla2',
    'blabla3'
];

task1($str_arr);
echo "<hr>";
task3(1,5);
echo "<hr>";
task4();
echo "<hr>";
task5();
echo "<hr>";
task6(text);