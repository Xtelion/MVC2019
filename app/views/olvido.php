<?php include_once 'header.php' ?>

<div class="card p-4 bg-light">
    <div class="card-header"><h1 class="text-center"><?= $data['subtitle'] ?></h1></div>
    <div class="card-body">
        <form action="<?= ROOT ?>login/olvido" method="POST">
            <div class="form-group text-left">
                <label for="email">Correo electronico:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group text-left">
                <input type="submit" value="enviar" class="btn btn-outline-success">
            </div>
        </form>
    </div>

    <div class="card-footer">
        <div class="row">
            <p>Recibiras un correo con tu enlace para el cambio de contraseña</p>
        </div>
    </div>

</div>

<?php include_once 'footer.php' ?>
