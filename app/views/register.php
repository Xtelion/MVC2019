<?php include_once 'header.php' ?>

<div class="col-8">

<div class="card p-4 bg-light">

    <div class="card-header">
        <h1 class="text-center">Registro</h1>
    </div>

    <div class="card-body">
        <form action="<?php ROOT ?>login/registro" method="POST">
            <div class="form-group text-left">
                <label for="first_name">Nombre:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="Escriba aqui su nombre">
            </div>
            <div class="form-group text-left">
                <label for="last_name_1">Apellido:</label>
                <input type="text" name="last_name_1" id="last_name_1" class="form-control" required placeholder="Escriba aqui su primer apellido">
            </div>
            <div class="form-group text-left">
                <label for="last_name_2">Segundo apellido:</label>
                <input type="text" name="last_name_2" id="last_name_2" class="form-control" placeholder="Escriba aqui su segundo apellido">
            </div>
            <div class="form-group text-left">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Escriba aqui su email">
            </div>
            <div class="form-group text-left">
                <label for="password1">Contraseña:</label>
                <input type="password" name="password2" id="password1" class="form-control" placeholder="Su contraseña debe contener 6 caracteres, y al menos una mayuscula">
            </div>
            <div class="form-group text-left">
                <label for="password2">Repita la contraseña:</label>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Repita su contraseña">
            </div>
            <div class="form-group text-left">
                <label for="address">Direccion:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Direccion">
            </div>
            <div class="form-group text-left">
                <label for="city">Ciudad:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad">
            </div>
            <div class="form-group text-left">
                <label for="state">Provincia:</label>
                <input type="text" name="state" id="state" class="form-control" placeholder="Provincia">
            </div>
            <div class="form-group text-left">
                <label for="postCode">Codigo postal:</label>
                <input type="text" name="postCode" id="postCode" class="form-control" placeholder="Codigo postal">
            </div>
            <div class="form-group text-left">
                <label for="country">Pais:</label>
                <input type="text" name="country" id="country" class="form-control" placeholder="Pais">
            </div>
            <div class="form-group text-left">
                <input type="submit" class="btn btn-outline-primary" value="Enviar">
                <a href="login/" class="btn btn-outline-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <div class="card-footer">

    </div>

</div>

</div>


<?php include_once 'footer.php' ?>