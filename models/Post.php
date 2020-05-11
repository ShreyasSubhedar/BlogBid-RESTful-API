<?php
class Post
{
  // Establishing Connetion
  private $conn;

  // Posts Properties (DB Attributes)*
  public $id;
  public $category_id;
  public $category_name;
  public $title;
  public $body;
  public $author;
  public $created_at;

  // Constructor

  public function __construct($DB)
  {
    $this->conn = $DB;
  }
  public function read()
  {
    $query = ' SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at 
            FROM posts p
            LEFT JOIN categories c 
            ON c.id = p.category_id';
    //Preparing Query
    $stmt = $this->conn->prepare($query);

    // Executing Query
    $stmt->execute();

    return $stmt;
  }
}
