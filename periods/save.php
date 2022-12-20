<?php
print_r($_POST);
include('../config/connection.php');

$query = "INSERT INTO Period (Name, DateStart, DateStop, IsActive) VALUES('{$_POST['Name']}','{$_POST['DateStart']}', '{$_POST['DateStop']}',1)";
echo $query;
$statement = $mysqli->prepare($query);
$statement->execute();
header("Location: index.php");
