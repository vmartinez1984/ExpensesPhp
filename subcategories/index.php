<?php
include('../config/connection.php');
include('../templates/header.php');
?>
<?php
$result = $mysqli->query("SELECT * FROM Expense WHERE IsActive = 1 ORDER BY Id DESC");
?>
<div class="container">
    <h1>Lista de subcategorias</h1>

    <a href="expenses/subcategorias">Agregar nuevo</a>
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['SubcategoryId'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Amount'] ?></td>
                            <td></td>
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