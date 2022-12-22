<?php
include_once('../models/Connection.php');

class InvestmentRepository extends Connection
{
    public function __construct(){
        parent::__construct();
    }

    public function get_all(){
        $query = "SELECT * FROM Investment WHERE IsActive = 1 ORDER BY Name";
        $result = $this->mysqli->query($query);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }

        return $array;
    }

    public function get_by($id){
        $query = "SELECT * FROM Investment WHERE Id = {$id}";
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function add($investment){
        $query = "INSERT INTO Investment (Name, DateStart, DateStop, Interest, IsActive, Amount, InstructionId, Term) 
        VALUES('{$_POST['Name']}','{$_POST['DateStart']}', '{$_POST['DateStop']}', {$_POST['Interest']} ,1, {$_POST['Amount']},{$_POST['InstructionId']}, {$_POST['Term']})";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }

    public function update($period){
        $query = "UPDATE Investment SET Name ='{$period['Name']}', DateStart = '{$period['DateStart']}', DateStop  = '{$period['DateStop']}' WHERE Id = {$period['Id']}";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }

    public function delete($periodId){
        $query = "UPDATE Investment SET IsActive = 0 WHERE Id = {$periodId}";
        $statement = $this->mysqli->prepare($query);

        $statement->execute();
    }
}