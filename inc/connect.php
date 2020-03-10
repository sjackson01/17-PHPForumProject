<?php # Script 17.1 Connection.php
// This file contains the database access information
DEFINE('DB_HOST','mysql:3306');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'tiger');
DEFINE('DB_NAME', 'forum2');

$mysqli = new $MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>