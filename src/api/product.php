<?php

abstract class product_list
{


  public function __construct($product_sku, $product_name, $product_price, $book_weight, $disc_size, $furniture_height, $furniture_width, $furniture_length)
  {
    $this->product_sku = $product_sku;
    $this->product_name = $product_name;
    $this->product_price = $product_price;
    $this->book_weight = !empty($book_weight) ? "$book_weight" : NULL;
    $this->disc_size = !empty($disc_size) ? "$disc_size" : NULL;
    $this->furniture_height = !empty($furniture_height) ? "$furniture_height" : NULL;
    $this->furniture_width = !empty($furniture_width) ? "$furniture_width" : NULL;
    $this->furniture_length = !empty($furniture_length) ? "$furniture_length" : NULL;
  }
  abstract public function get_product_id();
  abstract public function get_product_sku();
  abstract public function get_product_name();
  abstract public function get_product_price();
  public function insert_new_data()
  {

    $product_db = new database();
    $conn = $product_db->get_conn();
    $sql_product_insert = "INSERT IGNORE INTO product (product_sku, product_name, product_price, book_weight, disc_size, furniture_height, furniture_width, furniture_length ) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->book_weight', '$this->disc_size', '$this->furniture_height', '$this->furniture_width', '$this->furniture_length')";
    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }
    if ($conn->query($sql_product_insert) === TRUE) {
      $id = $conn->insert_id;
      echo "Insert to DB succes" . $sql_product_insert;
    } else {
      echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
    }
    $conn->close();
  }
  public static function display_product()
  {

    $show_product = new database();
    $conn = $show_product->get_conn();
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

  public function product_delete($data_id){
    $db = new database();
    $conn = $db->get_conn();
    foreach ($data_id as $id){
        echo $id;
        
        $sql_delete = "DELETE FROM product WHERE product.product_id = $id";
    
        if ($conn->query($sql_delete) === TRUE){
    
           }
           else {
            echo "Error1: " . $sql_delete . "<br>" . $conn->error;
           }
    }
    
    $conn->close();
    exit; 
}
}

class book extends product_list
{
  public $book_weight;
  public $book_product_id;

  function get_product_id()
  {
    return $this->product_id;
  }
  function get_product_sku()
  {
    return $this->product_sku;
  }
  function get_product_name()
  {
    return $this->product_name;
  }
  function get_product_price()
  {
    return $this->product_price;
  }
  function get_book_weight()
  {
    return $this->book_weight;
  }

  function insert_new_data()
  {
    $product_db = new database();
    $conn = $product_db->get_conn();
    $sql_product_insert = "INSERT INTO product (product_sku, product_name, product_price, book_weight) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->book_weight')";
    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }
    if ($conn->query($sql_product_insert) === TRUE) {
      $id = $conn->insert_id;
    //   echo "Insert to DB succes" . $sql_product_insert;
    } else {
      echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
    }
    $conn->close();
  }
}

class disc extends product_list
{
  public $disc_size;
  public $disc_product_id;


  function get_product_id()
  {
    return $this->product_id;
  }
  function get_product_sku()
  {
    return $this->product_sku;
  }
  function get_product_name()
  {
    return $this->product_name;
  }
  function get_product_price()
  {
    return $this->product_price;
  }
  function get_disc_size()
  {
    return $this->disc_size;
  }
  function insert_new_data()
  {
    $product_db = new database();
    $conn = $product_db->get_conn();
    $sql_product_insert = "INSERT INTO product (product_sku, product_name, product_price, disc_size) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->disc_size')";
    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }
    if ($conn->query($sql_product_insert) === TRUE) {
      $id = $conn->insert_id;
    //   echo "Insert to DB succes" . $sql_product_insert;
    } else {
      echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
    }
    $conn->close();
  }
}

class furniture extends product_list
{
  public $height;
  public $width;
  public $length;
  public $furniture_product_id;


  function get_product_id()
  {
    return $this->product_id;
  }
  function get_product_sku()
  {
    return $this->product_sku;
  }
  function get_product_name()
  {
    return $this->product_name;
  }
  function get_product_price()
  {
    return $this->product_price;
  }
  function get_height()
  {
    return $this->height;
  }
  function get_length()
  {
    return $this->length;
  }
  function get_width()
  {
    return $this->width;
  }

  function insert_new_data()
  {
    $product_db = new database();
    $conn = $product_db->get_conn();
    $sql_product_insert = "INSERT INTO product (product_sku, product_name, product_price, furniture_height, furniture_width, furniture_length ) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->furniture_height', '$this->furniture_width', '$this->furniture_length')";
    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }
    if ($conn->query($sql_product_insert) === TRUE) {
      $id = $conn->insert_id;
    //   echo "Insert to DB succes" . $sql_product_insert;
    } else {
      echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
    }
    $conn->close();
  }
}

class validators
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

    $validator->insert_new_data();
  }
}
