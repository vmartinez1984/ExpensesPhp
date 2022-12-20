<?php
//print_r($_GET);
include('../config/connection.php');
include('../templates/header.php');
include_once '../models/subcategory.php';

$result = $mysqli->query("SELECT * FROM Period WHERE Id = {$_GET['id']} LIMIT 1");
$row = $result->fetch_assoc();
print_r($row);
?>
<br />

<div class="container">
    <form action="expenses/expenses/save.php">
        <select class="form-select">
            <option>Seleccione categoria</option>
        </select>
        <select class="form-select">
            <option>Seleccione subcategoria</option>
        </select>
        <input class="form-control" type="text" placeholder="Nombre" />
        <input class="form-control" type="number" placeholder="$" />
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Subcategoria</th>
                    <th>$</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subcategoryRepository = new SubcategoryRepository();
                foreach ($subcategoryRepository->get($_GET['id']) as $row) {
                ?>
                <tr>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['SubcategoryName']?></td>
                    <td>$ <?php echo $row['Amount']?></td>
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

<?php
include('../templates/footer.php');
?>