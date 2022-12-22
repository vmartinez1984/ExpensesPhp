<?php
include '../models/PeriodRepository.php';

$repository = new PeriodRepository();
$repository->update($_POST);

header("Location: index.php");