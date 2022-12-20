<?php
include('../config/connection.php');
include('../templates/header.php');
?>
<?php
$result = $mysqli->query("SELECT * FROM Category WHERE IsActive = 1 ORDER BY Id DESC");
?>
<div class="container">
    <h1>Lista de categorias</h1>

    <a href="/expenses/categories/create.php">Agregar nuevo</a>
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>                        
                        <th>Nombre</th>                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>                            
                            <td><?php echo $row['Name'] ?></td>                            
                            <td>
                                <a class="btn btn-warning text-white" href="edit/<?php echo $row['Id']?>">Editar</a>
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