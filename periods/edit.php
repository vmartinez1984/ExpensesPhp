<?php
include '../templates/header.php';
include '../models/PeriodRepository.php';

$repository = new PeriodRepository();
$period = $repository->get_by($_GET['Id']);
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="edit_post.php">
                <input type="hidden" name="Id" value="<?php echo $period['Id']?>"/>
                <input type="text" maxlength="20" class="form-control" name="Name" placeholder="Nombre" value="<?php echo $period['Name']?>"/>
                <input type="date" class="form-control" name="DateStart" value="<?php echo $period['DateStart']?>"/>
                <input type="date" class="form-control" name="DateStop" value="<?php echo $period['DateStop']?>"/>
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