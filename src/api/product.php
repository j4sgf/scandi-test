<?php
include ("db_conn.php");

abstract class product_list {
  public $product_id;
  public $product_sku;
  public $product_name;
  public $product_price;

  public function __construct($product_sku, $product_name, $product_price) {
    $this->product_sku = $product_sku;
    $this->product_name = $product_name;
    $this->product_price = $product_price;
    
  }
  abstract public function get_product_id() ;
  abstract public function get_product_sku() ;
  abstract public function get_product_name() ;
  abstract public function get_product_price() ;
  abstract public function insert_new_data();
  
}

class book extends product_list{
    public $book_weight;
    public $book_product_id;

    public function __construct($product_sku, $product_name, $product_price, $book_weight) {
        $this->product_sku = $product_sku;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->book_weight = $book_weight;
        // $this->insert_new_data();
    }

    function get_product_id() {
        return $this->product_id;
      }
    function get_product_sku() {
        return $this->product_sku;
      }
    function get_product_name() {
        return $this->product_name;
      }
    function get_product_price() {
        return $this->product_price;
      }
    function get_book_weight() {
        return $this->book_weight;
      }

    function insert_new_data() {
      $product_db = new database();
      $conn = $product_db->get_conn();
      $sql_product_insert = "INSERT INTO product_list (product_sku, product_name, product_price) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price')";
    //   if ($conn -> connect_errno) {
    //     echo "Failed to connect to MySQL: " . $conn -> connect_error;
    //     exit();
    //   }
      if ($conn->query($sql_product_insert) === TRUE) {
        $id = $conn -> insert_id;
        $sql_book = "INSERT INTO book (book_weight, product_id) VALUES ('$this->book_weight', '$id')";
      if ($conn->query($sql_book) === TRUE){
        // echo "New records created successfully";
       
        
      }
      else {
        
        // echo "Error1: " . $sql_book . "<br>" . $conn->error;
      }
        
      } else {
        // echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
      }
      $conn -> close();
    }

}

class disc extends product_list{
    public $disc_size;
    public $disc_product_id;

    public function __construct($product_sku, $product_name, $product_price, $disc_size) {
        $this->product_sku = $product_sku;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->disc_size = $disc_size;
        // $this->insert_new_data();
    }

    function get_product_id() {
        return $this->product_id;
      }
    function get_product_sku() {
        return $this->product_sku;
      }
    function get_product_name() {
        return $this->product_name;
      }
    function get_product_price() {
        return $this->product_price;
      }
    function get_disc_size() {
        return $this->disc_size;
      }

    function insert_new_data()
    {
      $product_db = new database();
      $conn = $product_db->get_conn();
      $sql_product_insert = "INSERT INTO product_list (product_sku, product_name, product_price) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price')";
      if ($conn -> connect_errno) {
        // echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
      }
      if ($conn->query($sql_product_insert) === TRUE) {
        $id = $conn -> insert_id;
        $sql_disc = "INSERT INTO disc (disc_size, product_id) VALUES ('$this->disc_size', '$id')";
       if ($conn->query($sql_disc) === TRUE){
        // echo "New records created successfully";
       }
       else {
        // echo "Error1: " . $sql_disc . "<br>" . $conn->error;
       }
        
      } else {
        // echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
      }
      $conn -> close();

  }

}

class furniture extends product_list{
    public $height;
    public $width;
    public $length;
    public $furniture_product_id;

    public function __construct($product_sku, $product_name, $product_price, $height, $width, $length) {
        $this->product_sku = $product_sku;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
        // $this->insert_new_data();
    }

    function get_product_id() {
        return $this->product_id;
      }
    function get_product_sku() {
        return $this->product_sku;
      }
    function get_product_name() {
        return $this->product_name;
      }
    function get_product_price() {
        return $this->product_price;
      }
    function get_height() {
        return $this->height;
      }
    function get_length() {
        return $this->length;
      }
    function get_width() {
        return $this->width;
      }

      function insert_new_data()
  {
      $product_db = new database();
      $conn = $product_db->get_conn();
      $sql_product_insert = "INSERT INTO product_list (product_sku, product_name, product_price) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price')";
      if ($conn -> connect_errno) {
        // echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
      }
      if ($conn->query($sql_product_insert) === TRUE) {
        $id = $conn -> insert_id;
        $sql_furniture = "INSERT INTO furniture (furniture_width, furniture_height, furniture_length, product_id) VALUES ('$this->width', '$this->height', '$this->length', '$id')";
        if ($conn->query($sql_furniture) === TRUE){
        // echo "New records created successfully";
       }
       else {
        // echo "Error1: " . $sql_furniture . "<br>" . $conn->error;
       }
        
      } else {
        // echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
      }
      $conn -> close();
  }

}
?>