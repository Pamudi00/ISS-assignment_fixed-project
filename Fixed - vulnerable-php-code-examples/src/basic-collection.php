<?php

// Cross-Site Scripting (XSS)
$name = htmlspecialchars($_GET['name']);
echo('Hello ' . $name);

// SQL Injection
$id = (int) $_POST['id'];
mysql_query("SELECT user FROM users WHERE id = " . mysql_real_escape_string($id));

// Command Injection
$cmd = escapeshellarg($_COOKIE['cmd]);
exec("cat /var/log/apache2/access.log | grep" . $cmd);

// Deprecated Function
$words = split(":", "split:this");