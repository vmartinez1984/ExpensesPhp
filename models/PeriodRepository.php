<?php
include_once('../models/Connection.php');

class PeriodRepository extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $query = "SELECT * FROM Period WHERE IsActive = 1";
        $result = $this->mysqli->query($query);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }

        return $array;
    }

    public function get_by($periodId)
    {
        $query = "SELECT * FROM Period WHERE Id = {$periodId}";
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function add($period)
    {
        $query = "INSERT INTO Period (Name, DateStart, DateStop, IsActive) VALUES('{$_POST['Name']}','{$_POST['DateStart']}', '{$_POST['DateStop']}',1)";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }

    public function update($period)
    {
        $query = "UPDATE Period SET Name ='{$period['Name']}', DateStart = '{$period['DateStart']}', DateStop  = '{$period['DateStop']}' WHERE Id = {$period['Id']}";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }

    public function delete($periodId){
        $query = "UPDATE Period SET IsActive = 0 WHERE Id = {$periodId}";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }
}