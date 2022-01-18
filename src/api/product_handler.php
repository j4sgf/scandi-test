<?php

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
        $validator->insertData();
    }
}

class InsertProduct
{
    public function insert($sql_product_insert)
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
}

class DisplayProduct
{
    public static function display()
    {
        $show_product = new Database();
        $conn = $show_product->getConn();
        $sql_product_show = "SELECT product_id, product_sku, product_name, product_price,
    book_weight, disc_size, furniture_height, furniture_width, furniture_length FROM product ORDER BY product_id ASC";
        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }
        $result =  $conn->query($sql_product_show);
        return $result;
        $conn->close();
    }
}

class DeleteProduct
{
    public static function delete($data_id)
    {
        $db = new Database();
        $conn = $db->getConn();
        foreach ($data_id as $id) {
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
