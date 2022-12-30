<?php
include '../models/ApartRepository.php';
include '../models/SubcategoryRepository.php';

$subcategoryRepository = new SubcategoryRepository();
$apartRepository = new ApartRepository();

$apartRepository->add($_POST);

header("Location: index.php");