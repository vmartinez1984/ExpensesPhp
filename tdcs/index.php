<?php
include('../templates/header.php');
include_once '../businessLayer/ExpensesBl.php';

$expensesBl = new ExpensesBl();
?>
<div class="container">
    <h1>Lista de tarjetas de crédito</h1>

    <a href="../tdcs/create_post.php">Agregar nuevo</a>
    <br /><br />
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Banco</th>
                        <!-- <th>Cantidad</th> -->
                        <th>Dia de corte</th>
                        <th>Fecha de pago</th>
                        <th>Interes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                  
                    <?php foreach ($expensesBl->tdc->get_all() as $row) { ?>
                        <?php //var_dump($row) ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Bank'] ?></td>
                            <td><?php echo $row['DayCut'] ?></td>
                            <td><?php echo $row['DatePay'] ?></td>
                            <td><?php echo $row['Interest'] ?></td>
                            <td>
                            <a class="btn btn-warning text-white" href="details.php?Id=<?php echo $row['Id'] ?>&msi=false">Detalles</a>
                                <a class="btn btn-warning text-white" href="edit.php?Id=<?php echo $row['Id'] ?>">Editar</a>
                                <a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id'] ?>">Borrar</a>
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
