<?php
include '../models/InvestmentRepository.php';
print_r($_POST);

$repository = new InvestmentRepository();
$repository->add($_POST);
header("Location: index.php");