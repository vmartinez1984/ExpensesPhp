<?php
include '../models/SubcategoryRepository.php';
//print_r($_POST);

$subcategory;
$subcategoryRepository = new SubcategoryRepository();

$subcategory = [
    'CategoryId' => $_POST['CategoryId'],
    'Name' => $_POST['Name'],
    'Amount' => $_POST['Amount']
];
$subcategoryRepository->add($subcategory);

header("Location: /subcategories/index.php");