<?php

?>
<form action="<?php url_base("/expenses/create_post.php") ?>" method="POST">
    <input type="hidden" value="<?php echo $period['Id'] ?>" name="PeriodId" />
    <div class="row">
        <div class="col">
            <select class="form-select" name="SubcategoryId" id="SubcategoryId" onchange="setAmount()">
                <option class="text-info">Seleccione</option>
                <?php foreach ($subcategoryRepository->getAll() as $row) { ?>
                    <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col">
            <input class="form-control" type="text" placeholder="Nombre" name="Name" />
        </div>
        <div class="col">
            <input class="form-control" type="number" placeholder="$" name="Amount" id="Amount" step="0.01" />
        </div>
        <div class="col">
            <div>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </div>
</form>
<script>
    var subcategories = []
    <?php foreach ($subcategoryRepository->getAll() as $row) { ?>
        subcategories.push({
            id: <?php echo $row['Id'] ?>,
            name: "<?php echo $row['Name'] ?>",
            amount: <?php echo $row['Amount'] ?>
        })
    <?php } ?>

    function setAmount() {
        var value = document.getElementById('SubcategoryId').value;
        //console.log(value)
        subcategories.forEach(item => {
            if (value == item.id) {
                document.getElementById('Amount').value = item.amount;
            }
        });
    }
</script>