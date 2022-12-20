<?php
include('../config/connection.php');
include('../templates/header.php');
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="save.php">
                <input type="text" maxlength="20" class="form-control" name="Name" placeholder="Nombre"/>
                <input type="date" class="form-control" name="DateStart"/>
                <input type="date" class="form-control" name="DateStop"/>
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>

<?php
include('../templates/footer.php');
?>