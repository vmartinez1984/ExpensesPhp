<?php
include '../templates/header.php';
include '../models/PeriodRepository.php';
include '../models/CategoryRepository.php';
include '../models/SubcategoryRepository.php';
include '../models/ExpenseRepository.php';
include '../config/config.php';

$subcategoryRepository = new SubcategoryRepository();
$expenseRepository = new ExpenseRepository();
$expense = $expenseRepository->get_by_id($_GET['Id']);
?>
<div class="container mt-2">

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="<?php url_base("/expenses/edit_post.php") ?>" method="POST">
                <input type="hidden" value="<?php echo $expense['Id'] ?>" name="Id" />
                <input type="hidden" value="<?php echo $expense['PeriodId'] ?>" name="PeriodId" />

                <div class="row">
                    <div class="col">
                        <select class="form-select" name="SubcategoryId">
                            <option>Seleccione</option>
                            <?php foreach ($subcategoryRepository->getAll() as $row) { ?>
                                <?php if($row['Id'] == $expense['SubcategoryId']){?>
                                    <option value="<?php echo $row['Id'] ?>" selected ><?php echo $row['Name'] ?></option>
                                <?php }else{?>
                                    <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" placeholder="Nombre" name="Name" type="hidden" value="<?php echo $expense['Name'] ?>" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" placeholder="$" name="Amount" type="hidden" value="<?php echo $expense['Amount'] ?>" />
                    </div>
                    <div class="col">
                        <div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>