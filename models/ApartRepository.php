<?php
include_once '../models/Connection.php';

class ApartRepository extends Connection{

    public function __construct(){
        parent::__construct();
    }

    public function get_all($subcategory){
        //echo $subcategory;
        $query = "SELECT Apart.*, Expense.Name, Category.Id CategoryId, Category.Name CategoryName, Subcategory.Name SubcategoryName
        FROM  Apart 
        LEFT JOIN Expense ON Apart.ExpenseId = Expense.Id  
        LEFT JOIN Subcategory ON Expense.SubcategoryId = Subcategory.Id
        LEFT JOIN Category ON Subcategory.CategoryId = Category.Id
        WHERE Apart.IsActive = 1
        ";
        if($subcategory != 0){
            $query .= " AND Subcategory.Id = {$subcategory}";
        }
        $result = $this->mysqli->query($query);
        $array = array();         
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        
        return $array;
    }

    public function add($apart){
        $query = "INSERT INTO Apart (ExpenseId, Amount, DateRegistration, IsActive) VALUE(?,?,Now(),1)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('id', $apart['ExpenseId'], $apart['Amount']);
        
        $statement->execute();
        $query = "SELECT LAST_INSERT_ID() Id";
        $statement = $this->mysqli->prepare($query);
        $result = $this->mysqli->query($query);
        $row = $result->fetch_assoc();

        return $row['Id'];
    }
}