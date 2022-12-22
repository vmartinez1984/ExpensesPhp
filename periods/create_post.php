<?php
include '../models/PeriodRepository.php';

$repository = new PeriodRepository();
$repository->add($_POST);

header("Location: index.php");