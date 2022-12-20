<?php
include ('../templates/header.php');
include ('../models/SubcategoryRepository.php');
include ('../models/CategoryRepository.php');

$subcategoryRepository = new SubcategoryRepository();
$categoryRepository = new CategoryRepository();
$subcategory = $subcategoryRepository->getById($_GET['Id']);
//print_r($subcategory);
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="update.php">
                <input type="hidden" value="<?php echo $subcategory['Id'] ?>" name="Id"/>
                <select class="form-select" name="CategoryId">
                    <option>Seleccione categoria</option>
                    <?php foreach($categoryRepository->getAll() as $row) { ?>
                        <?php if($row['Id'] == $subcategory['CategoryId']){ ?>
                            <option value="<?php echo $row['Id'] ?>" selected><?php echo $row['Name'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <input type="text" placeholder="Nombre" maxlength="50" class="form-control" name="Name" value="<?php echo $subcategory['Name'] ?>"/>
                <input type="number" placeholder="$" maxlength="5" class="form-control" name="Amount" value="<?php echo $subcategory['Amount'] ?>"/>
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