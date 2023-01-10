<?php
include_once '../templates/header.php';
include_once '../businessLayer/ExpensesBl.php';

$expenseBl = new ExpensesBl();
$expense = $expenseBl->expense->get_by_id($_GET['Id']);
?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <h2 class="text-danger">¿Desea borrar?</h2>
        </div>
        <div class="card-body">
            <dl>
                <dt>Nombre</dt>
                <dd class="text-danger"><?php echo $expense['Name'] ?></dd>
                <dt>Subcategory</dt>
                <dd class="text-danger"><?php echo $expense['SubcategoryName'] ?></dd>
                <dt>Cantidad</dt>
                <dd class="text-danger">$ <?php echo $expense['Amount'] ?></dd>
            </dl>
        </div>
        <div class="card-footer">
            <form action="delete_post.php" method="POST">
                <input type="hidden" value="<?php echo $expense['Id'] ?>" name="Id"/>
                <button class="btn btn-danger" type='submit'>Borrar</button>
            </form>
        </div>        
    </div>

</div>

<?php
include('../templates/footer.php');
?>