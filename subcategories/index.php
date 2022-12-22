<?php
include('../templates/header.php');
include('../models/SubcategoryRepository.php');
setlocale(LC_MONETARY, 'es_MX');

$subcategoryRepository = new SubcategoryRepository();
$total = 0;
?>
<div class="container">
    <h1>Lista de subcategorias</h1>

    <a href="/expenses/subcategories/create.php">Agregar nuevo</a>
    <br /><br />
    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                  
                    <?php foreach ($subcategoryRepository->getAll() as $row) { ?>
                        <tr>
                            <td><?php echo $row['CategoryName'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td>$ <?php echo number_format($row['Amount'],2) ?></td>
                            <?php $total += $row['Amount'] ?>
                            <td>
                                <a class="btn btn-warning text-white" href="edit.php?Id=<?php echo $row['Id'] ?>">Editar</a>
                                <a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id'] ?>">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>$ <?php echo $total ?></td>
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