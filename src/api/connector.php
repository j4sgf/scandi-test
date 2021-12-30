<?php
header("Access-Control-Allow-Origin: *"); // Allow
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST,GET,DELETE");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

// get database connection
include_once './db_conn.php';
// instantiate product model 
include_once './product.php';

//Connection to database
$database = new database();
$conn = $database->get_conn();

$product_sku = isset($_POST['product_sku']) ? $_POST['product_sku'] : '';
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
$book_weight = isset($_POST['book_weight']) ? $_POST['book_weight'] : '';
$disc_size = isset($_POST['disc_size']) ? $_POST['disc_size'] : '';
$furniture_height = isset($_POST['furniture_height']) ? $_POST['furniture_height'] : '';
$furniture_width = isset($_POST['furniture_width']) ? $_POST['furniture_width'] : '';
$furniture_length = isset($_POST['furniture_length']) ? $_POST['furniture_length'] : '';
$product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';

$product_details = array($product_sku,
$product_name,
$product_price,
$book_weight,
$disc_size,
$furniture_height,
$furniture_width,
$furniture_length);
$validators = [
    'disc_detail' => 'disc',
    'book_detail' => 'book',
    'furniture_detail' => 'furniture',
];


//get request method from client 
$request = $_SERVER['REQUEST_METHOD'];

//check request method client
switch ($request) {
    case 'GET':


        //code if the client request method GET
        $data = product_list::display_product();
        $row = mysqli_fetch_row($data);
        return $row;

        break;

    case 'POST':


        //code if the client request method is POST
        if (
            isset($product_sku) &&
            isset($product_name) &&
            isset($product_price) &&
            (isset($disc_size) ||
                isset($book_weight) ||
                isset($furniture_height) ||
                isset($furniture_width) ||
                isset($furniture_length)
            )
        ) {
             $result = array(
                    "product_sku" => $product_sku,
                    "status_massage" => "Unabletocreateproduct"
                );
                echo json_encode($result);
            if ($product =  new validators($product_type, $validators, $product_details)) {

                // set response code - 201 created
                http_response_code(201);
                //echo json_encode(array("status_code"=>"201"));
                //telltheusere
                echo json_encode(array("Log" => "Product was created."));
            } else {
                //setresponsecode-503serviceunavailable
                http_response_code(503);

                //telltheuser
                //echojson_encode(array("message"=>"Unabletocreateproduct."));

                $result = array(
                    "status_kode" => 503,
                    "status_massage" => "Unabletocreateproduct"
                );
                echo json_encode($result);
            }
        } else {
            //setresponsecode-400badrequest
            http_response_code(400);

            $result = array(
                "status_code" => 400,
                "status_massage" => "Unable to create product",
            );
            echo json_encode($result);
      
        }

        break;

    case 'DELETE':
        //code if the client request method is DELETE
        product_list::display_product($data_id);


        break;

    default:
        //code if the client request is not GET ,POST ,PUT ,DELETE 
        http_response_code(404);

        echo "Request not Permitted";
}
