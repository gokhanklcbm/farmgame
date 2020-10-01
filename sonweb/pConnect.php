<?php
/*

$host = "127.0.0.1";
$username = "eggricol_web";
$password = "8x7xjYJ6k6";
$db = "eggricol_eggricol";
*/
$host = "127.0.0.1";
$username = "eggricol_web";
$password = "";
$db = "eggricol_eggricol";
$conn = new mysqli($host, $username, $password, $db);
$conn->set_charset("utf8");
if ($conn->connect_error)
    die("SQL Connection Error!");

?>
