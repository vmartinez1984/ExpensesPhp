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
$total = 0;
?>
<br />

<div class="container mt-5">
    <form action="<?php url_base("/expenses/create.php") ?>" method="POST">
        <input type="hidden" value="<?php echo $period['Id'] ?>" name="PeriodId" />
        <select class="form-select" name="SubcategoryId">
            <option>Seleccione</option>
            <?php foreach ($subcategoryRepository->getAll() as $row) { ?>
                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
            <?php } ?>
        </select>
        <input class="form-control" type="text" placeholder="Nombre" name="Name" />
        <input class="form-control" type="number" placeholder="$" name="Amount" />
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table">
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
                <tbody>
                    <?php foreach ($expenseRepository->get_all($_GET['Id']) as $row) { ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['SubcategoryName'] ?></td>
                            <?php if ($row['CategoryId'] == 1) { ?>
                                <?php $total -= $row['Amount'] ?>
                                <td>$ <?php echo $row['Amount'] ?></td>
                                <td></td>
                                <td>$ <?php echo $total ?></td>
                            <?php } else { ?>
                                <?php $total += $row['Amount'] ?>
                                <td></td>
                                <td>$ <?php echo $row['Amount'] ?></td>
                                <td>$ <?php echo $total ?></td>
                            <?php } ?>
                            <td>
                                <button class="btn btn-warning text-white">Editar</button>
                                <button class="btn btn-danger">Borrar</button>
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