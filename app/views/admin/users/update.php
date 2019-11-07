<?php include_once (VIEWS . 'header.php') ?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Alta de un usuario administrador</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>AdminUser/update/<?= $data['user']->id ?> " method="POST">
                <div class="form-group text-left">
                    <label for="name">Usuario:</label>
                    <input type="text" name="name" class="form-control" placeholder="Escribe tu nombre completo" required value="<?= isset($data['user']->name) ? $data['user']->name : '' ?>">
                </div>
                <div class="form-group text-left">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" class="form-control" placeholder="Escribe tu correo electrónico" required value="<?= isset($data['user']->email) ? $data['user']->email : '' ?>">
                </div>
                <div class="form-group text-left">
                    <label for="password1">Contraseña:</label>
                    <input type="password" name="password1" class="form-control" placeholder="Introduce tu contraseña solo si quiere cambiarla">
                </div>
                <div class="form-group text-left">
                    <label for="password2"> Repetir contraseña:</label>
                    <input type="password" name="password2" class="form-control" placeholder="Repite tu contraseña">
                </div>
                <div class="form-group">
                    <label for="status">Selecciona un estado:</label>
                    <select name="status" id="status" class="form-control">
                        <?php  foreach ($data['status'] as $status) : ?>
                        <option value="<?=  $status->value ?>" <?=  $status->value == $data['user']->status ? 'SELECTED' : '' ?>><?=  $status->description ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group text-left">
                    <input type="submit" value="modificar" class="btn btn-outline-success">
                    <a href="<?= ROOT ?>AdminUser" class="btn btn-outline-info">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
<?php include_once (VIEWS . 'footer.php') ?>