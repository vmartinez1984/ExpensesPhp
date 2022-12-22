<?php
include_once '../models/PeriodRepository.php';

$repository = new PeriodRepository();
$period = $repository->delete($_POST['Id']);

header("Location: index.php");
?>