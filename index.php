<?php

error_reporting(E_ALL);

require_once('./src/function.php');

echo 'Задание 1:' . "<br><br>";
task1('data.xml');
echo "<hr>";
echo 'Задание 2:' . "<br><br>";
task2();
echo "<hr>";
echo 'Задание 3:' . "<br><br>";
echo task3();
echo "<hr>";
echo 'Задание 4:' . "<br><br>";
$res = task4();
echo 'page_id: ' . $res['pageid'] . '<br>';
echo 'title: ' . $res['title'] . '<br>';