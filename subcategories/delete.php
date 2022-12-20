<?php
include_once '../templates/header.php';
include_once '../models/SubcategoryRepository.php';

$repository = new SubcategoryRepository();
$subcategory = $repository->getById($_GET['Id']);
?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <h2 class="text-danger">¿Desea borrar?</h2>
        </div>
        <div class="card-body">
            <dl>
                <dt>Nombre</dt>
                <dd><?php echo $subcategory['Name'] ?></dd>
                <dt>Subcategoria</dt>
                <dd><?php echo $subcategory['CategoryName'] ?></dd>
                <dt>$</dt>
                <dd><?php echo $subcategory['Amount'] ?></dd>
            </dl>
        </div>
        <div class="card-footer">
            <form action="deleteConfirm.php" method="POST">
                <input type="hidden" value="<?php echo $subcategory['Id'] ?>" name="Id"/>
                <button class="btn btn-danger" type='submit'>Borrar</button>
            </form>
        </div>        
    </div>

</div>

<?php
include('../templates/footer.php');
?>