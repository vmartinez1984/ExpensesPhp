<?php
include '../templates/header.php';
include '../config/config.php';
include '../models/InvestmentRepository.php';

$repository = new InvestmentRepository();
$total = 0;
foreach ($repository->get_all() as $row) {
    $total += $row['Amount'];
}
?>

<div class="container">
    <h1>Lista de inversiones</h1>

    <a href="../investment/create.php">Agregar nuevo</a>
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Interes</th>
                        <th>$</th>
                        <th>Instrucción</th>
                        <th>Plazo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$ <?php echo number_format($total, 2) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php foreach ($repository->get_all() as $row) { ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['DateStart'] ?></td>
                            <td><?php echo $row['DateStop'] ?></td>
                            <td><?php echo $row['Interest'] ?>%</td>
                            <td>$ <?php echo number_format($row['Amount'], 2)?></td>
                            <td><?php echo $row['InstructionId'] ?></td>
                            <td><?php echo $row['Term'] ?></td>
                            <td>                                
                                <a href="edit.php?Id=<?php echo $row['Id'] ?>" class="btn btn-warning text-white">Editar</a>
                                <a href="delete.php?Id=<?php echo $row['Id'] ?>" class="btn btn-danger text-white">borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$ <?php echo number_format($total, 2) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('../templates/footer.php');
?>