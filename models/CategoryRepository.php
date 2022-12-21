<?php
include_once '../models/Connection.php';

class CategoryRepository extends Connection{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $query = "SELECT * FROM Category WHERE IsActive = 1";
        $result = $this->mysqli->query($query);
        $array = array();         
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        
        return $array;
    }
}