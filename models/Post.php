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
  // Read all 
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
            ON c.id = p.category_id
            ORDER BY p.created_at DESC';
    //Preparing Query
    $stmt = $this->conn->prepare($query);

    // Executing Query
    $stmt->execute();

    return $stmt;
  }
  // Read by ID
  public function read_one()
  {
    // Preparing Query..
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
            ON c.id = p.category_id
            WHERE 
            p.id =?
            LIMIT 0,1
            ';
    //Preparing Query
    $stmt = $this->conn->prepare($query);

    //Binding the parameter (ID)
    $stmt->bindParam(1, $this->id);

    //Execute query
    $stmt->execute();

    // Fetching all values

    $row =  $stmt->fetch(PDO::FETCH_ASSOC);

    // Setting Properties

    $this->title = $row['title'];
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];
    $this->author = $row['author'];
    $this->body = $row['body'];
    $this->created_at = $row['created_at'];
  }

  // Update the Post's data 
    public function update()
  {
    // Preparing Query..
    $query = ' UPDATE posts
    SET 
   title = :title,
   body = :body,
   author = :author,
   category_id = :category_id
   WHERE id = :id
    ';
    //Preparing Query
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    try {
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':body', $this->body);
      $stmt->bindParam(':author', $this->author);
      $stmt->bindParam(':category_id', $this->category_id);
      $stmt->bindParam(':id', $this->id);
    } catch (PDOException $e) {
    }

    //Execute Query
    if ($stmt->execute()) {
      return true;
    }
    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

 // Inserting the post data
  public function create()
  {
    // Preparing Query..
    $query = ' INSERT INTO posts
    SET 
    title = :title,
    body = :body,
    author = :author,
    category_id = :category_id
    ';
    //Preparing Query
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));

    // Bind Data
    try {
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':body', $this->body);
      $stmt->bindParam(':author', $this->author);
      $stmt->bindParam(':category_id', $this->category_id);
    } catch (PDOException $e) {
    }

    //Execute Query
    if ($stmt->execute()) {
      return true;
    }
    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }
}
