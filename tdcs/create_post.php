<?php
include '../models/BuyRepository.php';
//print_r($_POST);
$repository = new BuyRepository();
$repository->add($_POST);

header("Location: details.php?Id=".$_POST['TdcId']);