<?php
include_once '../models/Connection.php';

class BuyRepository extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($tdcId, $msi)
    {
        //echo $msi;
        if ($msi == 'true') {
            $query = "SELECT * FROM Buy WHERE TdcId = {$tdcId} AND IsActive = 1 AND MonthsWhithoutInterest !=0 ORDER BY Id Desc";
        } else {
            $query = "SELECT * FROM Buy WHERE TdcId = {$tdcId} AND IsActive = 1 ORDER BY Id Desc";
        }
        //echo $query;
        $result = $this->mysqli->query($query);
        $array = array();

        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        return $array;
    }

    public function add($buy)
    {
        $query = "INSERT INTO buy (Name, MonthsWhithoutInterest, Amount, TdcId, DateRegistration, IsActive) VALUES(?,?,?,?,NOW(),1);";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('sidi', $buy['Name'], $buy['MonthsWhithoutInterest'], $buy['Amount'], $buy['TdcId']);
        $statement->execute();
        $query = "SELECT LAST_INSERT_ID() Id";
        $statement = $this->mysqli->prepare($query);
        $result = $this->mysqli->query($query);
        $row = $result->fetch_assoc();
        print_r($row);

        return $row['Id'];
    }

    public function get_by_id($expenseId)
    {
        $query = "SELECT * FROM Expense WHERE Id = {$expenseId}";

        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public  function delete($expenseId)
    {
        $query = "UPDATE Expense SET IsActive = 0 WHERE Id = {$expenseId}";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }

    public  function update($expense)
    {
        $query = "UPDATE Expense SET  Name = ?, SubcategoryId = ?, Amount = ?, PeriodId = ? WHERE Id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param('sidii', $expense['Name'], $expense['SubcategoryId'],  $expense['Amount'], $expense['PeriodId'], $expense['Id']);

        $statement->execute();
    }
}
