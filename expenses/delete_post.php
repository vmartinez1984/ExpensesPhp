<?php
include_once '../businessLayer/ExpensesBl.php';

$expenseBl = new ExpensesBl();
$expense = $expenseBl->expense->get_by_id($_POST['Id']);
$expenseBl->expense->delete($_POST['Id']);
//print_r($expense);

header("Location: ../periods/details.php?Id=" . $expense['PeriodId']);
