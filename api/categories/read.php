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

// Creating categories object
$categories = new Categories($db);
// Blog categories query
$result = $categories->read($categories);

// Get Row Count
$num = $result->rowCount();

if ($num > 0) {
    $categories_arr = array();
    $categories_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $categories_item = array(
            "id" => $id,
            "category name" => $name,
            "Time-Stamp" => $created_at
        );
        // Push to 'data'
        array_push($categories_arr['data'], $categories_item);
    }

    // Turn to JSON 
    $pos = json_encode($categories_arr);
    $json = json_decode($pos);
    echo json_encode($json, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array('message' => "No data found"));
}
