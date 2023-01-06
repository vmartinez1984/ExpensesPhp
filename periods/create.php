<?php
//include('../templates/header.php');
?>

<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="create_post.php" class="row needs-validation" novalidate>
            <div class="col">
                <input type="text" maxlength="20" class="form-control" name="Name" placeholder="Nombre" required />
                <div class="invalid-feedback">El nombre es requerido</div>
            </div>
            <div class="col">
                <input type="date" class="form-control" name="DateStart" id="DateStart" required onchange="setDateStopMin()" />
            </div>
            <div class="col">
                <input type="date" class="form-control" name="DateStop" id="DateStop" required />
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
    }

    function hoyFecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yyyy = hoy.getFullYear();

        dd = addZero(dd);
        mm = addZero(mm);

        return yyyy + '-' + mm + '-' + dd;
    }

    function setDateStopMin() {
        document.getElementById('DateStart').min = hoyFecha()
    }

    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

        document.getElementById('DateStart').value = hoyFecha()
        document.getElementById('DateStop').min = hoyFecha()
    })()
</script>
<?php
//include('../templates/footer.php');
?>