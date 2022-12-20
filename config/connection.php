<?php
$mysqli = new mysqli("localhost", "root", "", "Expenses");
if ($mysqli->connect_errno) {
    echo "Error in connection" . $mysqli->connect_error;
}