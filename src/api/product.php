<?php

abstract class ProductList
{
    public function __construct($product_sku, $product_name, $product_price, $book_weight, $disc_size, $furniture_height, $furniture_width, $furniture_length)
    {
        $this->product_sku = $product_sku;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->book_weight = !empty($book_weight) ? "$book_weight" : null;
        $this->disc_size = !empty($disc_size) ? "$disc_size" : null;
        $this->furniture_height = !empty($furniture_height) ? "$furniture_height" : null;
        $this->furniture_width = !empty($furniture_width) ? "$furniture_width" : null;
        $this->furniture_length = !empty($furniture_length) ? "$furniture_length" : null;
    }
    public function getProductId()
    {
        return $this->product_id;
    }
    public function getProductSku()
    {
        return $this->product_sku;
    }
    public function getProductName()
    {
        return $this->product_name;
    }
    public function getProductPrice()
    {
        return $this->product_price;
    }
    public function insertNewData($sql_product_insert)
    {
        $product_db = new Database();
        $conn = $product_db->getConn();
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        }
        if ($conn->query($sql_product_insert) === true) {
            $id = $conn->insert_id;
            echo "Insert to DB succes" . $sql_product_insert;
        } else {
            echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
        }
        $conn->close();
    }
    public static function displayProduct()
    {
        $show_product = new Database();
        $conn = $show_product->getConn();
        $sql_product_show = "SELECT product_id, product_sku, product_name, product_price,
    book_weight, disc_size, furniture_height, furniture_width, furniture_length FROM product ORDER BY product_id ASC";
        // if ($conn -> connect_errno) {
        //   echo "Failed to connect to MySQL: " . $conn -> connect_error;
        //   exit();
        // }
        // else {
        //     echo "NICEB";
        // }

        $result =  $conn->query($sql_product_show);

        return $result;
        // echo "Error2: " . $sql_product_show . "<br>" . $conn->error;



        $conn->close();
    }

    public static function productDelete($data_id)
    {
        $db = new Database();
        $conn = $db->getConn();
        foreach ($data_id as $id) {
            echo $id;
        
            $sql_delete = "DELETE FROM product WHERE product.product_id = $id";
    
            if ($conn->query($sql_delete) === true) {
            } else {
                echo "Error1: " . $sql_delete . "<br>" . $conn->error;
            }
        }
    
        $conn->close();
        exit;
    }
}

class Book extends ProductList
{
    public $book_product_insert;

  
    public function get_book_weight()
    {
        return $this->book_weight;
    }

    public function insert_data()
    {
        $book_product_insert = "INSERT INTO product (product_sku, product_name, product_price, book_weight) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->book_weight')";
        parent::insertNewData($book_product_insert);
    }
}

class Disc extends ProductList
{
    public $disc_product_insert;

    public function get_disc_size()
    {
        return $this->disc_size;
    }
    public function insert_data()
    {
        $disc_product_insert = "INSERT INTO product (product_sku, product_name, product_price, disc_size) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->disc_size')";
        parent::insertNewData($disc_product_insert);
    }
}

class Furniture extends ProductList
{
    public $furniture_product_insert;
    public function get_height()
    {
        return $this->height;
    }
    public function get_length()
    {
        return $this->length;
    }
    public function get_width()
    {
        return $this->width;
    }

    public function insert_data()
    {
        $furniture_product_insert = "INSERT INTO product (product_sku, product_name, product_price, furniture_height, furniture_width, furniture_length ) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->furniture_height', '$this->furniture_width', '$this->furniture_length')";
        parent::insertNewData($furniture_product_insert);
    }
}

class Validators
{
    public function __construct($product_type, $validators, $product_details)
    {
        $product_sku = $product_details[0];
        $product_name = $product_details[1];
        $product_price = $product_details[2];
        $book_weight = $product_details[3];
        $disc_size = $product_details[4];
        $furniture_height = $product_details[5];
        $furniture_width = $product_details[6];
        $furniture_length = $product_details[7];

        $validatorClass = $validators[$product_type];
        $validator = new $validatorClass($product_sku, $product_name, $product_price, $book_weight, $disc_size, $furniture_height, $furniture_width, $furniture_length);
        $validator->insert_data();
    }
}
