<?php

if (PHP_SAPI === 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
}

$id = $_GET['id'] ?? 1;

$file_db = new PDO('sqlite:../database/database.sqlite');

$sql = "SELECT * FROM customers WHERE customerId = ?";
$stmt = $file_db->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

foreach ($result as $row) {
    $customer = $row['LastName'] . " - " . $row['Email'] . "\n";
}

    echo $customer;
}

