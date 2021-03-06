<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Including blog post object
include_once '../../config/Database.php';
include_once '../../models/Categories.php';
// Database connection
$database = new Database();
$db = $database->connect();

// Creating category object
$category = new Categories($db);

// Get the raw category Data

$data = json_decode(file_get_contents("php://input"));

$category->id = $data->id;

// DELETE Category

if($category->delete()){
echo json_encode(array('message'=>'Category Deleted'));
}
else{
    http_response_code(500);
    echo json_encode(array('message'=>'500 Error Occured'));
}
