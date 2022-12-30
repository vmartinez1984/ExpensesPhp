<?php
include_once '../models/InvestmentRepository.php';

$repository = new InvestmentRepository();
$repository->delete($_POST['Id']);

header("Location: index.php");
?>