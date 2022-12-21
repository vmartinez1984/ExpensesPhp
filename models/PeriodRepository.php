<?php
include_once('../models/Connection.php');

class PeriodRepository extends Connection{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all(){
        $query = "SELECT * FROM Period WHERE IsActive = 1";
        $result = $this->mysqli->query($query);
        $array = array();         
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        
        return $array;
    }

    public function get_by($periodId){
        $query = "SELECT * FROM Period WHERE Id = {$periodId}";
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }
}