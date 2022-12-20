<?php
//print_r($_POST);
include('../config/connection.php');
// if (isset($_POST['id'])) {
//     $query = "UPDATE Category SET Name = ? WHERE Id = ?";
//     $statement = $mysqli->prepare($query);
//     $statement->bind_param('si', $_POST['name'], $_POST['id']);
//     $statement->execute();
// } else {
    $query = "INSERT INTO Category (Name, IsActive) VALUES(?,1)";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $_POST['name']);
    $statement->execute();
    header("Location: index.php");
//}
