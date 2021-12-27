<?php

abstract class product_list {
  public $product_id;
  public $product_sku;
  public $product_name;
  public $product_price;
  public $disc_size;
  public $book_weight;
  public $furniture_height;
  public $furniture_width;
  public $furniture_length;



  public function __construct($product_sku, $product_name, $product_price) {
    $this->product_sku = $product_sku;
    $this->product_name = $product_name;
    $this->product_price = $product_price;


    
  }
  abstract public function get_product_id() ;
  abstract public function get_product_sku() ;
  abstract public function get_product_name() ;
  abstract public function get_product_price() ;
  public function insert_new_data(){
    $product_db = new database();
    $conn = $product_db->get_conn();
    echo ('weight: ' + $this->book_weight);
    echo ('size: ' + $this->disc_size);
    $sql_product_insert = "INSERT IGNORE INTO product (product_sku, product_name, product_price, book_weight, disc_size, furniture_height, furniture_width, furniture_length ) VALUES ('$this->product_sku', '$this->product_name', '$this->product_price', '$this->book_weight', '$this->disc_size', '$this->furniture_height', '$this->furniture_width', '$this->furniture_length')";
    if ($conn -> connect_errno) {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
    }
    if ($conn->query($sql_product_insert) === TRUE) {
      $id = $conn -> insert_id;

      
    } else {
      echo "Error2: " . $sql_product_insert . "<br>" . $conn->error;
    }
    $conn -> close();
  }
  public static function display_product(){
    
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
   
    while ($row = mysqli_fetch_row($result)) {
      echo ("\n");
      echo $row[0];
      echo ("\n");
      echo $row[1];
      echo ("\n");
      echo $row[2];
      echo ("\n");
      echo $row[3];
      echo ("\n");
      echo $row[4];
      echo ("\n");
      echo $row[5];
      echo ("\n");
      echo $row[6];
      echo ("\n");
      echo $row[7];
      echo ("\n");
      echo $row[8];
      echo ("\n");
    }
    echo ('ws');
    // echo "Error2: " . $sql_product_show . "<br>" . $conn->error;



    $conn->close();      
}
  
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

      function insert_new_data()
      {
         parent::insert_new_data();
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
     parent::insert_new_data();
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
     parent::insert_new_data();
  }

}
?>