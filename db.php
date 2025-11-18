<?php
class DB {
    private $host;
    private $user;
    private $pass;
    private $name;
    private $conn;

    function __construct($host, $user, $pass, $name)
    {
        $this->host;
        $this->user;
        $this->pass;
        $this->name;
        $this->set_conn($host, $user, $pass, $name);
    }

    function get_host() {
        return $this->host;
    }

    function get_user() {
        return $this->user;
    }

    function get_pass() {
        return $this->pass;
    }

    function get_name() {
        return $this->name;
    }

    function get_conn() {
        return $this->conn;
    }

    function set_host($host) {
        $this->host = $host;
    }

    function set_user($user) {
        $this->user = $user;
    }

    function set_pass($pass) {
        $this->pass = $pass;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function set_conn($host, $user, $pass, $name) {
        $conn = new mysqli($host, $user, $pass, $name);

        if ($conn->connect_error) {
            die("Error conexion bd: " . $conn->connect_error);
        }
    }
}

$DB_HOST = 'db';          
$DB_USER = 'root';        
$DB_PASS = 'root';    
$DB_NAME = 'db';      

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_error) {
    die("Error conexion bd: " . $mysqli->connect_error);
}

?>