<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Including blog post object
include_once '../../config/Database.php';
include_once '../../models/Post.php';
// Database connection
$database = new Database();
$db = $database->connect();

// Creating post object
$post = new Post($db);

// Get the raw posted Data

$data = json_decode(file_get_contents("php://input"));

$post->title =$data->title;
$post->body =$data->body;
$post->author =$data->author;
$post->category_id =$data->category_id;


// Create Post
if($post->create()){
    echo json_encode(array('message'=>'Post Creted'));
}
else{
    echo json_encode(array('message'=>'500 Error Occured'));
}
?>