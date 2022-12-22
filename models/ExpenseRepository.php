<?php
include_once '../models/Connection.php';

class ExpenseRepository extends Connection
{
    public function __construct() { parent::__construct(); }

    public function get_all($periodId){
        $query = "SELECT Expense.*, Subcategory.Name SubcategoryName, Category.Id CategoryId FROM Expense 
        INNER JOIN Subcategory ON Expense.SubcategoryId = Subcategory.Id 
        INNER JOIN Category ON Category.Id = Subcategory.CategoryId
        WHERE PeriodId = {$periodId}";
        $result = $this->mysqli->query($query);
        $array = array();

        while($row = $result->fetch_assoc()){
            array_push($array,$row);
        }
        return $array;
    }

    public function add($expense){
        $query = "INSERT INTO Expense (Name, SubcategoryId, Amount, PeriodId, IsActive) VALUE(?,?,?,?,1)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('sidi', $expense['Name'], $expense['SubcategoryId'], $expense['Amount'], $expense['PeriodId']);
        
        $statement->execute();
    }

    public function get_by_id($expenseId){
        $query = "SELECT * FROM Expense WHERE Id = {$expenseId}";

        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public  function delete($expenseId){
        $query = "UPDATE Expense SET IsActive = 0 WHERE Id = {$expenseId}";
        $statement = $this->mysqli->prepare($query);        
        
        $statement->execute();
    }

    public  function update($expense){
        $query = "UPDATE Expense SET  Name = ?, SubcategoryId = ?, Amount = ?, PeriodId = ? WHERE Id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('sidii', $expense['Name'], $expense['SubcategoryId'],  $expense['Amount'], $expense['PeriodId'], $expense['Id']);
        
        $statement->execute();
    }
}