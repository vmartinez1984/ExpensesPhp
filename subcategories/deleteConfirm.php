<?php
include_once '../models/SubcategoryRepository.php';

print_r($_POST);
$repository = new SubcategoryRepository();
$repository->delete($_POST['Id']);

header("Location: /expenses/subcategories/index.php");