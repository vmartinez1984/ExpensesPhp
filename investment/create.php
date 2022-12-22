<?php
include('../config/connection.php');
include('../templates/header.php');
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="create_post.php">
                <input type="text" maxlength="20" class="form-control" name="Name" placeholder="Nombre"/>
                <input type="date" class="form-control" name="DateStart"/>
                <input type="date" class="form-control" name="DateStop"/>
                <input type="number" class="form-control" name="Interest" placeholder="%" step="0.01"/>
                <input type="number" class="form-control" name="Amount" placeholder="$" step="0.01"/>
                <select class="form-select" name="InstructionId">
                    <option>Seleccione</option>
                    <option value="1">Renovación con intereses</option>
                    <option value="2">Renovación sin intereses</option>
                    <option value="3">Sin renovación</option>
                </select>
                <select class="form-select" name="Term">
                    <option>Seleccione</option>
                    <option value="1">1</option>
                    <option value="7">7</option>
                    <option value="28">28</option>
                </select>
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