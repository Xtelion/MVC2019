<?php include_once('header.php') ?>
<div class="col-8">
    <h1 class="text-center">Login</h1>
    <form action="login/verifyUser" method="POST">
        <div class="form-group text-left">
            <label for="user">Usuario</label>
            <input type="text" name="user" class="form-control">
        </div>
        <div class="form-group text-left">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-outline-success">
        </div>
        <div class="form-group text-left">
            <input type="checkbox" name="remember">
            <label for="remember">Recordar</label>
        </div>
    </form>
    <div class="row">
        <div>
            <a href="<?= ROOT ?>login/registro" class="btn btn-outline-info">Nuevo Usuario</a>
        </div>
        &nbsp;
        <div>
            <a href="<?= ROOT ?>login/olvido" class="btn btn-outline-info">Recordar la clave de acceso</a>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>