<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Including blog categories object
include_once '../../config/Database.php';
include_once '../../models/Categories.php';
// Database connection
$database = new Database();
$db = $database->connect();

// Creating post object
$categories = new Categories($db);
// Blog post query
$categories->id = isset($_GET['id']) ? $_GET['id'] : die();
$categories->read_one();
if( $categories->id!=null){
$categories_item = array(
    "id" => $categories->id,
    "name" => $categories->name,
    "Time-Stamp"=> $categories->created_at
);
print_r(json_encode(array('data'=>$categories_item), JSON_PRETTY_PRINT));
}
else{
    echo json_encode( array('message' => "No data found"));

}
?>