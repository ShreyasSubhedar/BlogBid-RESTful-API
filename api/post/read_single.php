<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Including blog post object
include_once '../../config/Database.php';
include_once '../../models/Post.php';
// Database connection
$database = new Database();
$db = $database->connect();

// Creating post object
$post = new Post($db);
// Blog post query
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_one();
if( $post->title!=null){
$post_item = array(
    "id" => $post->id,
    "category name" => $post->category_name,
    "title" => $post->title,
    "author"  => $post->author,
    "body"=> $post->body,
    "Time-Stamp"=> $post->created_at
);
print_r(json_encode(array('data'=>$post_item), JSON_PRETTY_PRINT));
}
else{
    echo json_encode( array('message' => "No data found"));

}
?>