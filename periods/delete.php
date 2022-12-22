<?php
include_once '../templates/header.php';
include_once '../models/PeriodRepository.php';

$repository = new PeriodRepository();
$period = $repository->get_by($_GET['Id']);
?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <h2 class="text-danger">¿Desea borrar?</h2>
        </div>
        <div class="card-body">
            <dl>
                <dt>Nombre</dt>
                <dd><?php echo $period['Name'] ?></dd>
                <dt>Fecha de inicio</dt>
                <dd><?php echo $period['DateStart'] ?></dd>
                <dt>Fecha fin</dt>
                <dd><?php echo $period['DateStop'] ?></dd>
            </dl>
        </div>
        <div class="card-footer">
            <form action="delete_post.php" method="POST">
                <input type="hidden" value="<?php echo $period['Id'] ?>" name="Id"/>
                <button class="btn btn-danger" type='submit'>Borrar</button>
            </form>
        </div>        
    </div>

</div>

<?php
include('../templates/footer.php');
?>