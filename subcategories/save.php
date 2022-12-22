<?php
include '../models/SubcategoryRepository.php';
include '../config/config.php';
print_r($_POST);
//echo 'Hola mundo';
$subcategory;
$subcategoryRepository = new SubcategoryRepository();

$subcategoryRepository->add($_POST);

header("Location: ".url_base_('/subcategories/index.php'));