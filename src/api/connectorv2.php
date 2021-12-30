<?php
header("Access-Control-Allow-Origin: *"); // Allow
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST,GET,PUT,DELETE");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

include_once './db_conn.php';
include_once './product.php';

class connector{
    public $product_sku;
    public $product_name;
    public $product_price;
    public $book_weight;
    public $disc_size;
    public $furniture_height;
    public $furniture_width;
    public $furniture_length;


}
?>