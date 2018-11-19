<?php

error_reporting(E_ALL);

// Задание 1
function task1($file) {
    $file = file_get_contents($file);
    $xml = new SimpleXMLElement($file);

    foreach ($xml->Address as $address_item) {
        echo '<div style="display: inline-block; border: 1px solid; margin-right: 50px;">';
        echo '<table border="1">';
        echo '<thead><tr>';
        echo '<td style="font-weight: bold;">Address Type:</td><td>' . $address_item->attributes()->Type . '</td>';
        echo '</tr></thead>';
        echo '<tbody>';
        echo "<tr><td>Name:</td><td>$address_item->Name</td>";
        echo "<tr><td>Street:</td><td>$address_item->Street</td>";
        echo "<tr><td>City:</td><td>$address_item->City</td>";
        echo "<tr><td>Zip:</td><td>$address_item->Zip</td>";
        echo "<tr><td>Country: </td><td>$address_item->Name</td>";
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }

    // Заметки для доставки
    echo '<br><br>';
    echo '<b>Delivery Notes: </b>' . $xml->DeliveryNotes . '<br><br>';

    // Таблица с заказанными товарами
    echo '<table  border="1" style="border: 1px solid #000;">';
    echo '<caption>Order Positions</caption>';
    echo '<thead ><tr>';
    echo '<td>Part Number</td>';
    echo '<td>Product Name</td>';
    echo '<td>Quantity</td>';
    echo '<td>Price</td>';
    echo '<td>Shipment Date</td>';
    echo'<td>Comments</td>';
    echo '</tr></thead>';
    echo '<tbody style="text-align: center;">';

    foreach ($xml->Items->Item as $shipItem) {
        echo '<tr>';
        echo '<td>' . $shipItem->attributes()->PartNumber . '</td>';
        echo '<td>' . $shipItem->ProductName . '</td>';
        echo '<td>' . $shipItem->Quantity . '</td>';
        echo '<td>' . $shipItem->USPrice . ' $</td>';

        //Вывод даты
        if (empty($shipItem->ShipDate)) {
            echo '<td></td>';
        } else {
            echo '<td>' . date('d M Y', strtotime($shipItem->ShipDate)) . '</td>';
        }
        echo '<td>' . $shipItem->Comment . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

// Задание 2
function task2() {
    $array = [
        "test" => "testtest",
        [
            "name" => "Andrey",
            "age" => 26,
            "year" => 1992
        ]
    ];

    $write_json = json_encode($array);
    file_put_contents('./output.json', $write_json);

    $read_json = file_get_contents('output.json');
    $decoded_json = json_decode($read_json, true);

    $is_rand = rand(0, 1);

    if ($is_rand) {
        $decoded_json[0]['name'] = 'Rodion';
        $decoded_json[0]['age'] = 27;
        $decoded_json[0]['year'] = 1991;
        $decoded_json['asd'] = 991;
        echo 'Изменения проведены: ' . "<br>";
    } else {
        echo 'Изменения не проведены: ' . "<br>";
    }

    $encoded = json_encode($decoded_json);
    file_put_contents('output2.json', $encoded);

//    До с.да норм
    $read_output = file_get_contents('output.json');
    $decode_output = json_decode($read_output, true);
    $read_output2 = file_get_contents('output2.json');
    $decode_output2 = json_decode($read_output2, true);

    var_dump($decode_output);
    echo "<br>";
    var_dump($decode_output2);
    echo "<br>";
    var_dump($decode_output[0]['name']);
    echo "<br>";
    var_dump($decode_output2[0]['name']);
    echo "<br>";
//    print_r($decode_output);
//    print_r($decode_output2);

    $diff1 = array_diff_assoc($decode_output, $decode_output2);
    $diff2 = array_diff_assoc($decode_output2, $decode_output);

    var_dump($diff1);
    var_dump($diff2);

    if (!empty($diff2)) {
        echo "<br>" . 'В файле output2.json имеются элементы отсутствующие в файле output.json';
        foreach ($diff2 as $key => $val) {
            echo "<br>" . 'Ключ:  ' . $key . ' => ' . 'Значение: ' . $val . "<br>";
        }
    }
}