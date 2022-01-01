<?php
header("Access-Control-Allow-Origin: *"); // Allow
header("Content-Type:application/x-www-form-urlencoded;charset=UTF-8");
header("Access-Control-Allow-Methods:POST,GET,PUT,DELETE");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

include_once './db_conn.php';
include_once './product.php';

class connector
{   
    public $product_id;
    public $product_sku;
    public $product_name;
    public $product_price;
    public $book_weight;
    public $disc_size;
    public $furniture_height;
    public $furniture_width;
    public $furniture_length;

    public function __construct()
    {
        
        $this->product_sku = isset($_POST['product_sku']) ? $_POST['product_sku'] : '';
        $this->product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
        $this->product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
        $this->book_weight = isset($_POST['book_weight']) ? $_POST['book_weight'] : '';
        $this->disc_size = isset($_POST['disc_size']) ? $_POST['disc_size'] : '';
        $this->furniture_height = isset($_POST['furniture_height']) ? $_POST['furniture_height'] : '';
        $this->furniture_width = isset($_POST['furniture_width']) ? $_POST['furniture_width'] : '';
        $this->furniture_length = isset($_POST['furniture_length']) ? $_POST['furniture_length'] : '';
        $this->product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $this->request = $_SERVER['REQUEST_METHOD'];
        $this->getProductDetails();
    }

    public function getProductDetails()
    {
        $product_details = array(
            $this->product_sku,
            $this->product_name,
            $this->product_price,
            $this->book_weight,
            $this->disc_size,
            $this->furniture_height,
            $this->furniture_width,
            $this->furniture_length
        );
        $validators = [
            'disc_detail' => 'disc',
            'book_detail' => 'book',
            'furniture_detail' => 'furniture',
        ];

        switch ($this->request) {
            case 'GET':
        
        
                //code if the client request method GET
                $data = product_list::display_product();
                while ($row = mysqli_fetch_row($data)){
                $result[]= $row;
                }
                echo json_encode ($result);
                return json_encode($result);
        
                break;
        
            case 'POST':
                if (isset($this->product_id)){
                    
                    product_list::product_delete($this->product_id);

                }
        
        
                //code if the client request method is POST
                else if (
                    isset($this->product_sku) &&
                    isset($this->product_name) &&
                    isset($this->product_price) &&
                    (isset($this->disc_size) ||
                        isset($this->book_weight) ||
                        isset($this->furniture_height) ||
                        isset($this->furniture_width) ||
                        isset($this->furniture_length)
                    )
                ) {
            
                    if ($this->product =  new validators($this->product_type, $validators, $product_details)) {
        
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
                        "status_massage" => "Unable a to create product",
                    );
                    echo json_encode($result);
              
                }
        
                break;
        
            default:
                //code if the client request is not GET ,POST ,PUT ,DELETE 
                http_response_code(404);
        
                echo "Request not Permitted";
        }
    }
}

$post_data = new connector();
