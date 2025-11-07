<?php
$DB_HOST = 'db';          
$DB_USER = 'root';        
$DB_PASS = 'root';    
$DB_NAME = 'db';      

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_error) {
    die("Error conexion bd: " . $mysqli->connect_error);
}

?>