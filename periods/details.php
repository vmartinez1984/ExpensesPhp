<?php
//print_r($_GET);
include('../config/connection.php');
include('../templates/header.php');
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
        <?php
        $query = "SELECT * FROM Expense INNER JOIN Subcategory ON Expense.SubcategoryId = Subcategory.Id WHERE PeriodId = {$_GET['id']}";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            echo '<br>';
            print_r($row);
        }
        ?>
    </div>
</div>

<?php
include('../templates/footer.php');
?>