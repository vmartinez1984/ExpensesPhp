<?php
include '../models/SubcategoryRepository.php';
print_r($_POST);

$subcategoryRepository = new SubcategoryRepository();
$subcategoryRepository->update($_POST);

header("Location: /expenses/subcategories/index.php");