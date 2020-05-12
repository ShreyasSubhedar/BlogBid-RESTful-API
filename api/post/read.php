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
$result = $post->read($post);

// Get Row Count
$num = $result->rowCount();

if($num >0){
    $posts_arr = array();
    $posts_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            "id" => $id,
            "category name" => $category_name,
            "title" => $title,
            "author"  => $author,
            "body"=> substr($body,0,100)."...",
            "Time-Stamp"=> $created_at
        );
       // Push to 'data'
        array_push($posts_arr['data'],$post_item);
    }

    // Turn to JSON 
    $pos = json_encode($posts_arr);
    $json = json_decode($pos);
echo json_encode($json, JSON_PRETTY_PRINT);
}
else{
    echo json_encode( array('message' => "No data found"));
}
