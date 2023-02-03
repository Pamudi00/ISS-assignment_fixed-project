<?php

if (PHP_SAPI === 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
}

$file_db = new PDO('sqlite:../database/database.sqlite');

if (NULL == $_GET['id']) $_GET['id'] = 1;

$sql = 'SELECT * FROM employees WHERE employeeId = ' . $_GET['id'];
$stmt = $file_db->prepare($sql);
$stmt->bind_param('s', $user_input);
$stmt->execute();
$result = $stmt->get_result();
foreach ($file_db->query($sql) as $row) {
    $employee = $row['LastName'] . " - " . $row['Email'] . "\n";

    echo $employee;
}
