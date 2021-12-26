
<?php

class product_box {
    public function create_box(){
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
        // echo "Error2: " . $sql_product_show . "<br>" . $conn->error;


        $conn->close();      
    }

    public function product_delete($data_id){
        $id = [];
        $db = new database();
        $id = $data_id;
        $conn = $db->get_conn();
        foreach ($id as $product_id){
            
            $sql_delete = "DELETE FROM product_list WHERE product_list.product_id = $product_id";
        
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

?>