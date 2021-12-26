<?php
require_once ('../product_display.php');

if(isset( $_POST['data_id'] )) {

     $data = new product_box();
     $data->product_delete($_POST['data_id']);
     echo $result;
}
?>