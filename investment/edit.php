<?php
include '../config/connection.php';
include '../templates/header.php';
include '../models/InvestmentRepository.php';

$repository = new InvestmentRepository();
$item = $repository->get_by_id($_GET['Id']);
//print_r($item)
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="edit_post.php">
                <input type="hidden" name="Id" value="<?php echo $item['Id'] ?>"/>
                <input type="text" maxlength="20" class="form-control" name="Name" placeholder="Nombre" value="<?php echo $item['Name'] ?>"/>
                <input type="date" class="form-control" name="DateStart" value="<?php echo $item['DateStart'] ?>"/>
                <input type="date" class="form-control" name="DateStop" value="<?php echo $item['DateStop'] ?>"/>
                <input type="number" class="form-control" name="Interest" placeholder="%" step="0.01" value="<?php echo $item['Interest'] ?>"/>
                <input type="number" class="form-control" name="Amount" placeholder="$" step="0.01" value="<?php echo $item['Amount'] ?>"/>
                <select class="form-select" name="InstructionId">
                    <option>Seleccione</option>
                    <option value="1" <?php if($item['InstructionId'] == "1") echo 'selected' ?> >Renovación con intereses</option>
                    <option value="2" <?php if($item['InstructionId'] == "2") echo 'selected' ?> >Renovación sin intereses</option>
                    <option value="3" <?php if($item['InstructionId'] == "3") echo 'selected' ?> >Sin renovación</option>
                </select>
                <select class="form-select" name="Term">
                    <option>Seleccione</option>
                    <option value="1"  <?php if($item['Term'] == "1") echo 'selected' ?> >1</option>
                    <option value="7"  <?php if($item['Term'] == "7") echo 'selected' ?> >7</option>
                    <option value="28" <?php if($item['Term'] == "28") echo 'selected' ?>>28</option>
                    <option value="91" <?php if($item['Term'] == "91") echo 'selected' ?>>91</option>
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