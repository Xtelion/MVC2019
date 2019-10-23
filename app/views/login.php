<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a href="index.php" class="navbar-brand">Tienda</a>
</nav>

<div class="container-fluid">
	<div class="row content">
		<div class="col-4">
			
		</div>
		<div class="col-4">
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
					<a href="login/alta" class="btn btn-outline-info">Nuevo Usuario</a>
				</div>
				&nbsp;
				<div>
					<a href="login/olvido" class="btn btn-outline-info">Recordar la clave de acceso</a>
				</div>
			</div>
		</div>
		<div class="col-4">
			
		</div>
	</div>
</div>

</body>
</html>