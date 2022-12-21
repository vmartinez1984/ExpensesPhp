<?php
include ('../templates/header.php');
include ('../models/CategoryRepository.php');
include '../config/config.php';

$categoryRepository = new CategoryRepository();
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php url_base("/subcategories/save.php"); ?>">
                <select class="form-select" name="CategoryId">
                    <option>Seleccione categoria</option>
                    <?php foreach($categoryRepository->getAll() as $row) { ?>
                        <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                    <?php } ?>
                </select>
                <input type="text" placeholder="Nombre" maxlength="50" class="form-control" name="Name"/>
                <input type="number" placeholder="$" maxlength="5" class="form-control" name="Amount"/>
                <button class="btn btn-primary" type="submit">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>

<?php
include('../templates/footer.php');
?>