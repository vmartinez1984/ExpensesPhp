<?php
include '../templates/header.php';
include '../models/ApartRepository.php';
include '../models/SubcategoryRepository.php';
include '../config/config.php';

$subcategoryRepository = new SubcategoryRepository();
$apartRepository = new ApartRepository();
$subcategory = 0;
if(isset($_GET['Subcategory'])){
    $subcategory = $_GET['Subcategory'];
}
$total = 0;
foreach ($apartRepository->get_all($subcategory) as $row) {
    $total += $row['Amount'];
}
?>
<br />

<div class="container mt-1">
    <div class="card">
        <div class="card-header">
            <?php foreach ($subcategoryRepository->get_aparts() as $row) { ?>
                <a href="index.php?Subcategory=<?php echo $row['Id'] ?>" class="btn btn-info text-white"><?php echo $row['Name'] ?></a>                
            <?php } ?>
        </div>
        <div class="card-body">
            <form action="<?php url_base("/aparts/add_post.php") ?>" method="POST">
                <input type="hidden" value="0" name="ExpenseId" />
                <div class="row">
                    <div class="col">
                        <select class="form-select" name="SubcategoryId">
                            <option>Seleccione</option>
                            <?php foreach ($subcategoryRepository->get_aparts() as $row) { ?>
                                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col">
                        <input class="form-control" type="number" placeholder="$" name="Amount" step="0.01" />
                    </div>
                    <div class="col">
                        <div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Apartado</th>
                        <th>Nombre</th>
                        <th>$</th>
                        <th>Fecha</th>                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Apartado</th>
                        <th>Nombre</th>
                        <th>$</th>
                        <th>Fecha</th>                        
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($apartRepository->get_all($subcategory) as $row) { ?>
                        <tr class="<?php if($row['Amount']<0) echo 'text-danger' ?>">
                            <td><?php echo $row['SubcategoryName'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td>$ <?php echo number_format($row['Amount'], 2) ?></td>
                            <td><?php echo $row['DateRegistration'] ?></td>                           
                        </tr>
                    <?php } ?>
                    <tr class="text-info">
                        <td></td>
                        <td>Total</td>
                        <td>$ <?php echo number_format($total, 2) ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('../templates/footer.php');
?>