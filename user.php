<?php
    class User {
        private $email;
        private $name;
        private $password;
        private $balance;

        function __construct($email, $name, $password, $balance) {
            $this->email = $email;
            $this->name = $name;
            $this->password = $password;
            $this->balance = $balance;
        }

        function get_email() {
            return $this->email;
        }

        function get_name() {
            return $this->name;
        }

        function get_password() {
            return $this->password;
        }

        function get_balance() {
            return $this->balance;
        }

        function set_email($email) {
            $this->email = $email;
        }

        function set_name($name) {
            $this->name = $name;
        }

        function set_password($password) {
            $this->password = $password;
        }

        function set_balance($balance) {
            $this->balance = $balance;
        }
    }
?>