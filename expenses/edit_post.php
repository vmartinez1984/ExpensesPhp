<?php
include '../models/ExpenseRepository.php';
include '../config/config.php';

print_r($_POST);
$repository = new ExpenseRepository();
$repository->update($_POST);

header("Location: ".url_base_("/periods/details.php?Id=".$_POST['PeriodId']));