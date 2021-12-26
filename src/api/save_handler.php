<?php
require_once ('../product_save.php');
switch ($_POST['productType']){
    case "book_detail": 
        $new_book = new book($_POST['product_sku'], $_POST['product_name'], $_POST['product_price'],$_POST['weight']);
        $new_book->insert_new_data();
        break;
    case "disc_detail": 
        $new_disc = new disc($_POST['product_sku'], $_POST['product_name'], $_POST['product_price'],$_POST['disc_size']);
        $new_disc->insert_new_data();
        
        break;
    case "furniture_detail": 
        $new_furniture = new furniture($_POST['product_sku'], $_POST['product_name'], $_POST['product_price'],$_POST['height'],$_POST['width'],$_POST['length']);
        $new_furniture->insert_new_data();
        break;
}
header('Location: ../index.php');
exit();
;
?>