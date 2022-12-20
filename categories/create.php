<?php
include('../config/connection.php');
include('../templates/header.php');
?>
<?php
$result = $mysqli->query("SELECT * FROM Expense WHERE IsActive = 1 ORDER BY Id DESC");
?>
<div class="container">
    <h1>Agregar categoria</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="save.php">                
                <input class="form-control" name="name" type="text" placeholder="Nombre"/>
                <button class="btn btn-primary" type="submit">
                    Agregar
                </button>
            </form>
        </div>

    </div>
</div>

<?php
include('../templates/footer.php');
?>