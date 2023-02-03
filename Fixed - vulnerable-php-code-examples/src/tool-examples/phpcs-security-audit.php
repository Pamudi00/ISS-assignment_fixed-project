<?php
/* Tests script for phpcs-security-audit */

//eval($_GET['a']);
echo "aaaa";
$b = htmlspecialchars($_POST['b']);
echo "bbbb" .$b;
$a = mysql_real_escape_string($_GET['a']);
db_query($a);
preg_replace("/.*/ei", 'aaaaaaa', 'bbbbb');
$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
$b = filter_input(INPUT_GET, 'b', FILTER_SANITIZE_STRING);
$c = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);

if(preg_match('/^[a-zA-Z0-9]+$/',$a) && preg_match('/^[a-zA-Z0-9]+$/',$b) && preg_match('/^[a-zA-Z0-9]+$/',$c)){
	preg_replace("/.*/ei",$a,'aaaaaaa');
	preg_replace($b,$a,$c);
}else{
	//handle error
}
$b = preg_quote($_GET['a'], '/');
preg_replace("/aaa/", $b, 'ababaaa');


// BadFunctions
bcrypt();
phpinfo();
create_function($a);
ftp_exec($a);
fread($a);
array_map($a);
`$a`;
`$_GET`;
include($a);
assert($a);
assert($_GET);
exec($a);
exec($_GET);
mysql_query($a);
mysql_query($_GET);


// Crypto
mcrypt_encrypt();
openssl_public_encrypt($i, $e, $k, OPENSSL_PKCS1_PADDING);

// CVEs
xml_parse_into_struct(xml_parser_create_ns(), str_repeat("<blah>", 1000), $a);
quoted_printable_encode(str_repeat("\xf4", 1000));

// Misc
$a->withHeader('Access-Control-Allow-Origin', '*');
include('abc.xyz');

// Easy user input
$_GET['a'] = 'xss';
$a = htmlspecialchars($_GET['a']);
print("aaa" .$a);
$a = htmlspecialchars($_GET['a']);
echo $a;
$a = htmlspecialchars($_GET['a']);
echo $a;
$a = htmlspecialchars($_GET['a']);
echo "{$a}";
$a = htmlspecialchars($_GET['a']);
print "${a}";
$b = $_GET['b'];
if (function_exists($b)){
	echo $b();
}else{
	echo "Invalid function name.";
}
$c = $_GET['c'];
if (function_exists($c)){
	echo allo($c());
}else{
	echo "Invalid function name.";
}
echo arg(1);
die("" . $_GET['a']);
exit("exit" . $_GET['a']);
?>
$a = htmlspecialchars($_GET['a']);
echo $a;
<?php

// FilesystemFunctions
file_create_filename(arg(1));
symlink($a);
delete($a);

// Drupal 7 Dynamic queries SQLi
$query = db_select('tname', "wn");
$query->join('node', 'n', $a);
$query->innerJoin('node', 'n', $a);
$query->leftJoin('node', 'n', $a);
$query->rightJoin('node', 'n', $a);
$query->addExpression($a, 'w');
$query->groupBy($a);

$query->orderBy($a, $a);
$query->range('safe', 'safe');

$count = $query
    ->fields("wn")
    ->condition('email', '1', $_GET)
    ->condition('email', '1')
    ->where($a, array(":aaa" => '2'))
    ->havingCondition('email', '', $a)
    ->having($a, $args = array(":aaa" => '2'))
    ->execute()
    ->rowCount();
echo $count;

$query = db_update('tname')
    ->expression($a, $a)
    ->execute();

$nid = db_insert('tname')
    ->fields(array(
        $a => 'safe',
        $b => 'safe',
        'c' => 'safe',

    ))
    ->values(array(
        'safe' => 'safe',
    ))
    ->execute();

$query = db_select('node', 'n');
$myselect = db_select('mytable')
    ->fields($_GET)
    ->condition('myfield', 'myvalue');
$alias = $query->join($myselect, 'myalias', 'n.nid = myalias.nid');


?>