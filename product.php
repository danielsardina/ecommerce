<?php

class Product {
    private $id;
    private $name;
    private $price;
    private $stock;
    private $image;

    function __construct($id, $name, $price, $stock, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
    }

    function get_id() {
        return $this->id;
    }

    function get_name() {
        return $this->name;
    }

    function get_price() {
        return $this->price;
    }

    function get_stock() {
        return $this->stock;
    }

    function get_image() {
        return $this->image;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function set_price($price) {
        $this->price = $price;
    }

    function set_stock($stock) {
        $this->stock = $stock;
    }

    function set_image($image) {
        $this->image = $image;
    }
}

?>