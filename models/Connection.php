<?php
include('../config/connection.php');

class Connection
{
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "Expenses");
        if ($this->mysqli->connect_errno) {
            echo "Error in connection" . $this->mysqli->connect_error;
        }
    }
}