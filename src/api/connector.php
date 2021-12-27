<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json;charset=UTF-8");
    header("Access-Control-Allow-Methods:POST,GET,PUT,DELETE");
    header("Access-Control-Max-Age:3600");
    header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
    // get database connection
    include_once './db_conn.php';
    
    // instantiate product model 
    include_once './product.php';
     
    //Connection to database
    $database = new database();
    $conn = $database->get_conn();


 


    //get request method from client 
    $request = $_SERVER['REQUEST_METHOD'];
 
    //check request method client
    switch($request)
    {
        case 'GET' :
        
        //code if the client request method GET
        $data = product_list::display_product();
        echo ($data);
             
        break;
 
        case 'POST' :
        //code if the client request method is POST
        if(
            isset($_POST['product_sku'])&&
            isset($_POST['product_name'])&&
            isset($_POST['product_price'])&&
            (
            isset($_POST['disc_size'])||
            isset($_POST['length'])||
            isset($_POST['width'])||
            isset($_POST['height'])||
            isset($_POST['book_weight'])
        )
        ){

            if($product = new disc(($_POST['product_sku']), ($_POST['product_name']), ($_POST['product_price']), ($_POST['disc_size']), ($_POST['book_weight']))){
         
                // set response code - 201 created
                http_response_code(201);
                //echo json_encode(array("kode_status"=>"201"));
                $product->insert_new_data();
                //telltheusere
                echo json_encode(array("pesan_kesalahan" => "Product was created."));
            
        }
        else{
            //setresponsecode-503serviceunavailable
            http_response_code(503);
     
            //telltheuser
            //echojson_encode(array("message"=>"Unabletocreateproduct."));
     
            $result=array(
                "status_kode" => 503,
                "status_massage" => "Unabletocreateproduct"
            );
            echo json_encode($result);
        }
    }
        else{
            //setresponsecode-400badrequest
            http_response_code(400);
         
            $result=array(
                "status_code" => 400,
                "status_massage" => "Unable to create product"
            );
            echo json_encode($result);
            echo ($_POST['product_price']);
        }
         
        break;
 
        case 'PUT' :
        //code if the client request method is PUT

             
        break;
 
        case 'DELETE' :
        //code if the client request method is DELETE

        
        break;
 
        default :
        //code if the client request is not GET ,POST ,PUT ,DELETE 
        http_response_code(404);
 
        echo "Request not Permitted";
    }
