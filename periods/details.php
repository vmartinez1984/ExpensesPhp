<?php
include '../templates/header.php';
include '../models/PeriodRepository.php';
include '../models/CategoryRepository.php';
include '../models/SubcategoryRepository.php';
include '../models/ExpenseRepository.php';
include '../config/config.php';

$periodRepository = new PeriodRepository();
$period = $periodRepository->get_by($_GET['Id']);
$categoryRepository = new CategoryRepository();
$subcategoryRepository = new SubcategoryRepository();
$expenseRepository = new ExpenseRepository();
//print_r($expenseRepository->get_all($_GET['Id']));
//print_r($period);
$total = 0;
$ingresos = 2;
?>
<br />

<div class="container mt-1">
    <div class="card">
        <div class="card-header">
            <h3 class="text-info"><?php echo $period['Name'] ?></h3>
        </div>
        <div class="card-body">
            <?php include '../expenses/create.php' ?>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Subcategoria</th>
                        <th>$</th>
                        <th>$</th>
                        <th>$</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Subcategoria</th>
                        <th>$</th>
                        <th>$</th>
                        <th>$</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($expenseRepository->get_all($_GET['Id']) as $row) { ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['SubcategoryName'] ?></td>
                            <?php if ($row['CategoryId'] == $ingresos) { ?>
                                <?php $total += $row['Amount'] ?>
                                <td>$ <?php echo number_format($row['Amount'], 2) ?></td>
                                <td></td>
                                <td>$ <?php echo number_format($total, 2) ?></td>
                            <?php } else { ?>
                                <?php $total -= $row['Amount'] ?>
                                <td></td>
                                <td>$ <?php echo  number_format($row['Amount'], 2) ?></td>
                                <td>$ <?php echo number_format($total, 2) ?></td>
                            <?php } ?>
                            <td>
                                <a href="../expenses/edit.php?Id=<?php echo $row['Id'] ?>" class="btn btn-warning text-white">Editar</a>
                                <a href="../expenses/delete.php?Id=<?php echo $row['Id'] ?>" class="btn btn-danger text-white">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('../templates/footer.php');
?>