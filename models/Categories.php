<?php
class Categories
{
    // Establishing Connetion
    private $conn;

    // Category Properties (DB Attributes)*
    public $id;
    public $name;
    public $created_at;

    // Constructor

    public function __construct($DB)
    {
        $this->conn = $DB;
    }
    // Read all 
    public function read()
    {
        $query = ' SELECT * FROM categories 
            ORDER BY created_at DESC';
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
        $query = ' SELECT * FROM categories
            WHERE id =?
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

        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->created_at = $row['created_at'];
    }

    // Update the Category's data 
    public function update()
    {
        // Preparing Query..
        $query = ' UPDATE categories
    SET 
   name = :name
   WHERE id = :id
    ';
        //Preparing Query
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind Data
        try {
            $stmt->bindParam(':name', $this->name);
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

    // Inserting the category data
    public function create()
    {
        // Preparing Query..
        $query = ' INSERT INTO categories
    SET 
    name = :name
    ';
        //Preparing Query
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));

        // Bind Data
        try {
            $stmt->bindParam(':name', $this->name);
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

    // Deleting Category
    public function delete()
    {
        // Preparing Query..
        $query = ' DELETE  FROM categories WHERE id = :id';
        //Preparing Query
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind Data
        try {
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
}
