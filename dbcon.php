<?php
$servername = "localhost";
$username = "xpensyne_admin";
$password = "admin@xpensy";
$db = "xpensyne_expense";
$dbh = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
/*** set the error mode to excptions ***/
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>