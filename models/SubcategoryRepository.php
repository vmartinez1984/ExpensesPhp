<?php
include_once '../models/Connection.php';

class SubcategoryRepository extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public  function add($subcategory){
        $query = "INSERT INTO Subcategory (CategoryId, Name, Amount, IsActive) VALUES(?,?,?,1)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('isd', $subcategory['CategoryId'], $subcategory['Name'], $subcategory['Amount']);
        
        $statement->execute();
    }

    public  function delete($subcategoryId){
        $query = "UPDATE Subcategory SET IsActive = 0 WHERE Id = {$subcategoryId}";
        $statement = $this->mysqli->prepare($query);        
        
        $statement->execute();
    }

    public function getAll(){
        $query = "SELECT Subcategory.*, Category.Name CategoryName FROM Subcategory 
        INNER JOIN Category ON Category.Id = Subcategory.CategoryId WHERE Subcategory.IsActive = 1
        ORDER BY Subcategory.Name";
        $result = $this->mysqli->query($query);
        $array = array();         
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        
        return $array;
    }

    public function get_aparts(){
        $query = "SELECT Subcategory.*, Category.Name CategoryName 
        FROM Subcategory 
        INNER JOIN Category ON Category.Id = Subcategory.CategoryId 
        WHERE Subcategory.IsActive = 1 AND Category.Id = 3
        ORDER BY Subcategory.Name";
        $result = $this->mysqli->query($query);
        $array = array();         
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        
        return $array;
    }

    public function getById($subcategoryId){
        $query = "SELECT Subcategory.*, Category.Name CategoryName FROM Subcategory INNER JOIN Category ON Category.Id = Subcategory.CategoryId  WHERE Subcategory.Id = {$subcategoryId}";
        $result = $this->mysqli->query($query);        
        $row = $result->fetch_assoc();            
        
        return $row;
    }

    public  function update($subcategory){
        $query = "UPDATE Subcategory SET CategoryId = ?, Name = ?, Amount = ? WHERE Id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('isdi', $subcategory['CategoryId'], $subcategory['Name'], $subcategory['Amount'], $subcategory['Id']);
        
        $statement->execute();
    }
}
