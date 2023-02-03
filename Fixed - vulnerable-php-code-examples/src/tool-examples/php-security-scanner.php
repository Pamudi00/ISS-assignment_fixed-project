<?php

function bar() {
    foo($_GET['name']);
}

function foo($name) {
	$name = mysqli_real_escape_string($name);
	mysql_query("SELECT * FROM foo WHERE name = '$name'");
}