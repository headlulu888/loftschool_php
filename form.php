<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$street = $_POST['street'];
$house = $_POST['house'];
$part = $_POST['part']; // Корпус
$appt = $_POST['appt']; // Квартира
$floor = $_POST['floor'];
$comment = $_POST['comment'];
$payment = $_POST['payment']; // Требуется сдача?
$callback = $_POST['callback'];

// Существует ли callback
if($callback) {
    $callback = 0;
} else {
    $callback = 1;
}

// Проверка email
if(empty($email)) {
    $response['success'] = 0;
    $response['message'] = 'Ошибка нет email';
    echo json_encode($response);
    die;
}

//Запросы для БД
try {
    $pdo = new PDO("mysql:host; dbname=burgers", "root", "");
    $user_select = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $user_create = $pdo->prepare("INSERT INTO users (name, phone, email) VALUES (:name, :phone, :email)");
    $user_update = $pdo->prepare("UPDATE users SET name = :name, phone = :phone WHERE id = :user_id");
    $order_select = $pdo->prepare("SELECT MAX(id) as max_id, COUNT(id) as total FROM orders WHERE user_id = :user_id");
    $order_create = $pdo->prepare("INSERT INTO orders (user_id, street, house, part, appt, floor, payment, callback, comment) VALUES (:user_id, :street, :house, :part, :appt, :floor, :payment, :callback, :comment)");
} catch (PDOException $e) {
    $response['success'] = 0;
    $response['message'] = 'Ошибка на стадии подключения' . $e->getMessage();
    echo json_encode($response);
    die;
}



// Есть ли покупатель с данным email
try {
    $user_select->bindParam(':email', $email);
    $user_select->execute();
} catch(PDOException $e) {
    $response['success'] = 0;
    $response['message'] = 'Ошибка подключения по email' . $e->getMessage();
    echo json_encode($response);
    die;
}

// Получение массива по юзерам
$user_data = $user_select->fetchAll();

// Функция показать или создать пользователя
switch ($user_select->rowCount()) {
    case 0:
        try {
            $user_create->bindParam(':name', $name);
            $user_create->bindParam(':phone', $phone);
            $user_create->bindParam(':email', $email);
            $user_create->execute();
            $user_select->bindParam(':email', $email);
            $user_select->execute();
        } catch(PDOException $e) {
            $response['success'] = 0;
            $response['message'] = 'Ошибка создани и чтения нового пользователя' . $e->getMessage();
            echo json_encode($response);
            die;
        }
        $user_data = $user_select->fetchAll();
        $id = $user_data[0]['id'];
        break;
    case 1:
        try {
            $id = $user_data[0]['id'];
        } catch (PDOException $e) {
            $response['success'] = 0;
            $response['message'] = 'Ошибка обновления данных существующего пользователя' . $e->getMessage();
            echo json_encode($response);
            die;
        }
        break;
    default:
        $response['success'] = 0;
        $response['message'] = 'Ошибка найдено больше 1 пользователя' . $e->getMessage();
        echo json_encode($response);
        die;
}

// Создаем новый заказ
try {
    $order_create->bindParam(':user_id', $id);
    $order_create->bindParam(':street', $street);
    $order_create->bindParam(':house', $house);
    $order_create->bindParam(':part', $part);
    $order_create->bindParam(':appt', $appt);
    $order_create->bindParam(':floor', $floor);
    $order_create->bindParam(':payment', $payment);
    $order_create->bindParam(':callback', $callback);
    $order_create->bindParam(':comment', $comment);
    $order_create->execute();
    $order_select->bindParam(':user_id', $id);
    $order_select->execute();
} catch (PDOException $e) {
    $response['success'] = 0;
    $response['message'] = 'Ошибка создания нового заказа' . $e->getMessage();
    echo json_encode($response);
    die;
}

// Готовим письмо к отправке
$orders = $order_select->fetchAll();
var_dump($orders);
$mail_title = 'Заказ №' . $orders[0]['maxid'] . ' от ' . date('d.m.Y H-i-s');
$mail_text = 'Ваш заказ DarkBeefBurger 1шт 500р. будет доставлен по адресу: Улица.' . $street . ', дом.' . $house . ', корпус.' .  $part . ', этаж.' . $floor .  'Это Ваш ' . $orders[0]['total'] . ' заказ. Спасибо';

// Запись в файл
$file_path = '/letters/' . $mail_title . '.txt';
file_put_contents($file_path, $mail_text);

// Отправка на почту
try {
    mail('headlulu888@gmail.com', $mail_title, $mail_text);
    $is_sent = 1;
} catch (Exception $e) {
    $is_sent = 0;
}

// AJAX скрипт
$response['success'] = 1;
//var_dump($is_sent);
if($is_sent) {
    $response['message'] = 'Заказ успешно создан, письмо отправлено.';
} else {
    $response['message'] = 'Заказ создан, но письмо не отправлено.';
}

$response['order_num'] = $orders[0]['maxid'];
$response['total'] = $orders[0]['total'];
print_r($orders[0]['maxid']);
echo json_encode($response);