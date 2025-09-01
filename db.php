<?php
// db.php
// Professional database connection file using MySQLi with error handling and prepared statements support.
 
$host = 'localhost'; // Assuming local host; change if needed
$dbname = 'dbfcmwwwd9igjr';
$username = 'unkuodtm3putf';
$password = 'htk2glkxl4n4';
 
$mysqli = new mysqli($host, $username, $password, $dbname);
 
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
 
// Set charset to UTF-8 for proper encoding
$mysqli->set_charset("utf8mb4");
?>
