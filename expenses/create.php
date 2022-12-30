<?php
include '../models/ExpenseRepository.php';
include '../models/SubcategoryRepository.php';
include '../models/ApartRepository.php';

print_r($_POST);
$repository = new ExpenseRepository();
$expenseId = $repository->add($_POST);
$subcategoryRepository = new SubcategoryRepository();
$subcategory = $subcategoryRepository->getById($_POST['SubcategoryId']);
//print_r($subcategory);
$apartados = 3;
if($subcategory['CategoryId'] == $apartados){
    $apartRepository = new ApartRepository();
    $apart = [
        'ExpenseId' => $expenseId,
        'Amount' => $_POST['Amount']        
    ];
    $apartRepository->add($apart);
}
header("Location: ../periods/details.php?Id=".$_POST['PeriodId']);