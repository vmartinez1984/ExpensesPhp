<?php
include '../config/connection.php';
include '../templates/header.php';
include '../config/config.php';
?>
<?php
$result = $mysqli->query("SELECT * FROM Period WHERE IsActive = 1 ORDER BY Id DESC");
?>

<div class="container">
    <h1 class="text-info">Lista de periodos</h1>

    <!-- <a href="/expenses/periods/create.php">Agregar nuevo</a> -->
    <?php require_once 'create.php'?>
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>                        
                        <th>Nombre</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['DateStart'] ?></td>
                            <td><?php echo $row['DateStop'] ?></td>
                            <td>
                                <a href="/expenses/periods/details.php?Id=<?php echo $row['Id'] ?>" class="btn btn-info text-white">Detalles</a>
                                <a href="<?php url_base("/periods/edit.php?Id=".$row['Id']) ?>" class="btn btn-warning text-white">Editar</a>
                                <a href="<?php url_base("/periods/delete.php?Id=".$row['Id']) ?>" class="btn btn-danger text-white">borrar</a>
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