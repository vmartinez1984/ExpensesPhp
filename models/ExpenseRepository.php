<?php

class ExpenseRepository
{
    public function __construct() {}
    public function get($periodId)
    {
        $mysqli = new mysqli("localhost", "root", "", "Expenses");
        if ($mysqli->connect_errno) {
            echo "Error in connection" . $mysqli->connect_error;
        }
        $query = "SELECT Expense.*, Subcategory.Name SubcategoryName FROM Expense INNER JOIN Subcategory ON Expense.SubcategoryId = Subcategory.Id WHERE PeriodId = {$_GET['id']}";
        $result = $mysqli->query($query);
        $array = array();

        while($row = $result->fetch_assoc()){
            array_push($array,$row);
        }
        return $array;
    }
}
