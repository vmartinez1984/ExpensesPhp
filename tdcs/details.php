<?php
include '../templates/header.php';
include '../businessLayer/ExpensesBl.php';

//print_r($_GET);
$bl = new ExpensesBl();
$tdc = $bl->tdc->get_by_id($_GET['Id']);
$buys = $bl->buy->get_all($_GET['Id'], $_GET['msi']);

$total = 0;
?>
<br />

<div class="container mt-1">
    <div class="card">
        <div class="card-header">
            <h3 class="text-info"><?php echo $tdc['Name'] ?></h3>
            <?php if ($_GET['msi'] == 'false') { ?>
                <a href="details.php?Id=<?php echo $tdc['Id'] ?>&msi=true">Meses sin intereses</a>
            <?php } else { ?>
                <a href="details.php?Id=<?php echo $tdc['Id'] ?>&msi=false">Todos</a>
            <?php } ?>
        </div>
        <div class="card-body">
            <form action="../tdcs/create_post.php" method="POST">
                <input type="hidden" value="<?php echo $tdc['Id'] ?>" name="TdcId" />
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" placeholder="Nombre" name="Name" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" placeholder="Meses sin intereses" name="MonthsWhithoutInterest" max="36" min="0" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" placeholder="$" name="Amount" step="0.01" />
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

    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>MSI</th>
                        <th>$</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>MSI</th>
                        <th>$</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($buys as $row) { ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['MonthsWhithoutInterest'] ?></td>
                            <td><?php echo $row['Amount'];
                                $total += $row['Amount']; ?></td>
                            <td><?php echo $row['DateRegistration'] ?></td>
                            <td>
                                <a href="../expenses/edit.php?Id=<?php echo $row['Id'] ?>" class="btn btn-warning text-white">Editar</a>
                                <button class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo $total ?></td>
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