<?php

abstract class ProductList
{
    public function __construct($product_sku, $product_name, $product_price, $book_weight, $disc_size, $furniture_height, $furniture_width, $furniture_length)
    {
        $this->product_sku = $product_sku;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->book_weight = !empty($book_weight) ? "$book_weight" : 'null';
        $this->disc_size = !empty($disc_size) ? "$disc_size" : 'null';
        $this->furniture_height = !empty($furniture_height) ? "$furniture_height" : 'null';
        $this->furniture_width = !empty($furniture_width) ? "$furniture_width" : 'null';
        $this->furniture_length = !empty($furniture_length) ? "$furniture_length" : 'null';
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

    public function insertData()
    {
        $new_data = new InsertProduct();
        $sql_query = "INSERT INTO product (product_sku, product_name, product_price, book_weight, disc_size, furniture_height, furniture_width, furniture_length) VALUES ($this->product_sku, $this->product_name, $this->product_price, $this->book_weight, $this->disc_size, $this->furniture_height, $this->furniture_width, $this->furniture_length)";
        $new_data->insert($sql_query);
    }
}

class Book extends ProductList
{
    public $book_product_insert;
    public function getBookWeight()
    {
        return $this->book_weight;
    }
}

class Disc extends ProductList
{
    public $disc_product_insert;

    public function getDiscSize()
    {
        return $this->disc_size;
    }
}

class Furniture extends ProductList
{
    public $furniture_product_insert;

    public function getFurnitureHeight()
    {
        return $this->height;
    }
    public function getFurnitureLength()
    {
        return $this->length;
    }
    public function getFurnitureWidth()
    {
        return $this->width;
    }
}
